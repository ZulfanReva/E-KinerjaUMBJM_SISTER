<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Prodi;
use App\Models\Periode;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\PenilaianPerilakuKerja;
use App\Models\PenilaianSISTER;

class LaporanPenilaianController extends Controller
{
    public function index(Request $request)
    {
        // Ambil list Prodi untuk dropdown
        $prodiList = Prodi::all();

        // Ambil list periode untuk dropdown
        $periodeList = Periode::pluck('nama_periode', 'id')->toArray();

        // Query PenilaianSISTER dengan filter jika ada
        $penilaianSister = PenilaianSISTER::query();

        if ($request->filled('prodi')) {
            $penilaianSister->whereHas('dosen.prodi', function ($query) use ($request) {
                $query->where('id', $request->prodi);
            });
        }

        if ($request->filled('periode')) {
            $penilaianSister->whereHas('periode', function ($query) use ($request) {
                $query->where('nama_periode', $request->periode);
            });
        }

        // Ambil data penilaian sesuai filter
        $penilaianSister = $penilaianSister->with(['dosen', 'periode'])->get();

        // Kirim data ke tampilan
        return view('pageadmin.laporanpenilaian.index', [
            'penilaianSister' => $penilaianSister,
            'prodiList' => $prodiList,
            'periodeList' => $periodeList,
        ]);
    }


    public function show($id)
    {
        try {
            // Ambil data penilaian perilaku kerja, dosen, dan user
            $penilaian = PenilaianPerilakuKerja::with(['dosen.prodi', 'user.dosen'])->findOrFail($id);

            // Ambil data penilaian SISTER yang sesuai dengan dosen dan periode penilaian
            $nilaiSister = PenilaianSISTER::where('dosen_id', $penilaian->dosen_id)
                ->where('periode_id', $penilaian->periode_id)
                ->first();

            // Menambahkan nilai SISTER ke objek penilaian
            $penilaian->penilaian_sister = $nilaiSister;

            // Hitung total nilai
            $nilaiSisterValue = floatval($penilaian->penilaian_sister->total_nilai ?? 0);
            $nilaiPK = floatval($penilaian->total_nilai);
            $totalNilai = 0.6 * $nilaiSisterValue + 0.4 * $nilaiPK;

            // Tentukan grade berdasarkan total nilai
            $grade = $totalNilai >= 4.56 ? 'A' : ($totalNilai >= 3.56 ? 'B' : ($totalNilai >= 2.56 ? 'C' : ($totalNilai >= 1.56 ? 'D' : 'E')));

            // Tentukan kesimpulan berdasarkan grade
            $kesimpulan = [];
            if ($grade === 'A') {
                $kesimpulan = [
                    'Pujian dalam forum rapat resmi',
                    'Sertifikat keberhasilan',
                    'Piagam penghargaan',
                    'Tugas belajar atau studi lanjut (di dalam/luar negeri) atas biaya universitas',
                    'Loncat jabatan fungsional atau kenaikan pangkat istimewa',
                    'Publikasi atas biaya universitas',
                ];
            } elseif ($grade === 'B') {
                $kesimpulan = [
                    'Pujian dalam forum rapat resmi',
                    'Ucapan terima kasih secara formal',
                    'Sertifikat keberhasilan',
                    'Pembebasan SPP untuk pendidikan lanjutan',
                    'Tugas belajar (tergantung keputusan universitas)',
                ];
            } elseif ($grade === 'C') {
                $kesimpulan = [
                    'Pujian dalam forum rapat resmi (hanya jika dianggap cukup memadai)',
                    'Teguran lisan (jika dianggap perlu perbaikan)',
                    'Teguran tertulis (untuk dorongan peningkatan kinerja ke depannya)',
                ];
            } elseif ($grade === 'D') {
                $kesimpulan = [
                    'Teguran lisan atau tertulis',
                    'Peringatan keras',
                    'Penundaan kenaikan gaji berkala',
                    'Penundaan kenaikan pangkat',
                ];
            } else {
                $kesimpulan = [
                    'Peringatan keras',
                    'Pembebasan tugas',
                    'Penundaan kenaikan gaji berkala',
                    'Penundaan kenaikan pangkat',
                    'Pemberhentian jika tidak ada perbaikan signifikan',
                ];
            }

            // Menambahkan kesimpulan ke objek penilaian
            $penilaian->kesimpulan = $kesimpulan;

            // Menambahkan total nilai dan grade ke objek penilaian
            $penilaian->total_nilai_calculated = number_format($totalNilai, 2);
            $penilaian->grade = $grade;

            // Kirim data ke tampilan
            return view('pageadmin.laporanpenilaian.show', compact('penilaian'));
        } catch (\Exception $e) {
            // Jika data tidak ditemukan, redirect dengan pesan error
            return redirect()->route('admin.laporanpenilaian.index')
                ->with('error', 'Data penilaian tidak ditemukan.');
        }
    }



    public function exportPDF(Request $request)
    {
        // Get filtered data based on request parameters
        $query = PenilaianPerilakuKerja::with(['dosen.prodi', 'user.dosen', 'periode']);

        $periodeFilter = 'SEMUA PERIODE';
        if ($request->has('prodi') && $request->prodi) {
            $query->whereHas('dosen.prodi', function ($q) use ($request) {
                $q->where('id', $request->prodi);
            });
        }

        if ($request->has('periode') && $request->periode) {
            $query->whereHas('periode', function ($q) use ($request) {
                $q->where('nama_periode', $request->periode);
            });
            $periodeFilter = $request->periode;
        }

        $penilaianPerilaku = $query->get();

        // Loop untuk menambahkan nilai SISTER
        $penilaianPerilaku->each(function ($penilaian) {
            // Cari nilai SISTER dengan periode yang sama
            $nilaiSister = PenilaianSISTER::where('dosen_id', $penilaian->dosen_id)
                ->where('periode_id', $penilaian->periode_id)
                ->first();

            // Tambahkan nilai SISTER ke objek penilaian
            $penilaian->nilai_sister = $nilaiSister ? $nilaiSister->total_nilai : '-';
        });

        // Calculate grades and add as attribute
        $penilaianPerilaku->map(function ($penilaian) {
            // Hitung total nilai berdasarkan nilai SISTER dan nilai PK
            $nilaiSister = floatval($penilaian->nilai_sister !== '-' ? $penilaian->nilai_sister : 0);
            $nilaiPK = floatval($penilaian->total_nilai);
            $totalNilai = 0.6 * $nilaiSister + 0.4 * $nilaiPK;

            // Set grade berdasarkan total nilai yang baru
            $penilaian->grade = $totalNilai >= 4.56 ? 'A' : ($totalNilai >= 3.56 ? 'B' : ($totalNilai >= 2.56 ? 'C' : ($totalNilai >= 1.56 ? 'D' : 'E')));
            return $penilaian;
        });

        // Sort collection by total_nilai (descending) and grade
        $penilaianPerilaku = $penilaianPerilaku->sortByDesc(function ($penilaian) {
            $gradeOrder = [
                'A' => 1,
                'B' => 2,
                'C' => 3,
                'D' => 4,
                'E' => 5
            ];

            return [$penilaian->total_nilai, $gradeOrder[$penilaian->grade]];
        });

        // Encode images to base64
        $kopImage = base64_encode(file_get_contents(public_path('assets/foto/kopsurat.png')));
        $ttdImage = base64_encode(file_get_contents(public_path('assets/foto/ttddigital.png')));

        $pdf = PDF::loadView('pageadmin.laporanpenilaian.pdf', [
            'penilaianPerilaku' => $penilaianPerilaku,
            'exportDate' => Carbon::now()->format('d-m-Y H:i:s'),
            'kopBase64' => 'data:image/png;base64,' . $kopImage,
            'ttdBase64' => 'data:image/png;base64,' . $ttdImage,
            'periodeFilter' => $periodeFilter
        ]);

        $pdf->getDomPDF()->set_option('isRemoteEnabled', true);
        $pdf->getDomPDF()->set_option('isHtml5ParserEnabled', true);

        return $pdf->download('penilaian-perilaku-kerja-' . Carbon::now()->format('Y-m-d') . '.pdf');
    }
}
