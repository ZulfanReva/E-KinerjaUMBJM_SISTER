<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Dosen;
use App\Models\Prodi;
use App\Models\Periode;

class BerandaRoleController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $dosenAktif = null;
        $dosenTugasBelajar = null;
        $jumlahProdi = null;
        $periodes = Periode::all();
        $dosenByGrade = ['A' => 0, 'B' => 0, 'C' => 0, 'D' => 0, 'E' => 0];
        $selectedPeriode = null; // Tambahkan variabel untuk periode yang dipilih

        if ($user->role === 'admin') {
            $dosenAktif = Dosen::where('status', 'Aktif')->count();
            $dosenTugasBelajar = Dosen::where('status', 'Nonaktif')->count();
            $jumlahProdi = Prodi::count();
        }

        $periodeId = $request->input('periode_id');

        if ($periodeId) {
            $dosenData = DB::table('penilaian_sister')
                ->join('dosen', 'penilaian_sister.dosen_id', '=', 'dosen.id')
                ->select('dosen.nama_dosen', 'penilaian_sister.total_nilai')
                ->where('penilaian_sister.periode_id', $periodeId)
                ->get();

            foreach ($dosenData as $dosen) {
                $totalNilaiRounded = round($dosen->total_nilai, 1);
                if ($totalNilaiRounded >= 4.2) {
                    $dosenByGrade['A']++;
                } elseif ($totalNilaiRounded >= 3.4) {
                    $dosenByGrade['B']++;
                } elseif ($totalNilaiRounded >= 2.6) {
                    $dosenByGrade['C']++;
                } elseif ($totalNilaiRounded >= 1.8) {
                    $dosenByGrade['D']++;
                } else {
                    $dosenByGrade['E']++;
                }
            }

            // Ambil nama periode yang dipilih
            $selectedPeriode = Periode::where('id', $periodeId)->first();
        }

        if ($user->role === 'admin') {
            return view('pageadmin.berandaadmin', compact(
                'dosenAktif',
                'dosenTugasBelajar',
                'jumlahProdi',
                'dosenByGrade',
                'periodes',
                'selectedPeriode' // Tambahkan ke compact
            ));
        } elseif ($user->role === 'dosenberjabatan') {
            return view('pagedosenberjabatan.berandadosenberjabatan', compact(
                'dosenByGrade',
                'periodes',
                'selectedPeriode' // Tambahkan ke compact
            ));
        } else {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }

    public function filterPeriode(Request $request)
    {
        return redirect()->route('admin.beranda', ['periode_id' => $request->input('periode_id')]);
    }
}
