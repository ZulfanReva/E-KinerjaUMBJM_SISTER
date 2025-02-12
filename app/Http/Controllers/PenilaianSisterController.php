<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Prodi;
use App\Models\Periode;
use Illuminate\Http\Request;
use App\Models\PenilaianSISTER;
use Illuminate\Support\Facades\DB;
use App\Models\PenilaianPerilakuKerja;
use Illuminate\Database\Eloquent\PendingHasThroughRelationship;

class PenilaianSisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        // Ambil list Prodi untuk dropdown
        $prodiList = Prodi::all();

        // Ambil list periode dengan objek lengkap untuk dropdown
        $periodeList = Periode::all();  // Ubah ini menjadi mengambil semua objek Periode

        // Query penilaian SISTER dengan filter jika ada
        $penilaianSister = PenilaianSister::query();

        if ($request->filled('prodi')) {
            $penilaianSister->whereHas('dosen.prodi', function ($query) use ($request) {
                $query->where('id', $request->prodi);
            });
        }

        if ($request->filled('periode')) {
            $penilaianSister->where('periode_id', $request->periode);
        }

        // Ambil data penilaian sesuai filter
        $penilaianSister = $penilaianSister->with(['dosen', 'periode'])->paginate(10);

        // Ambil dosen dengan jabatan 'DOSEN PENGAJAR' sesuai filter
        $dosenPengajar = Dosen::with(['prodi', 'jabatan', 'penilaianSISTER.periode'])
            ->whereHas('jabatan', function ($query) {
                $query->where('nama_jabatan', 'DOSEN PENGAJAR');
            });

        // Terapkan filter berdasarkan prodi jika dipilih
        if ($request->filled('prodi')) {
            $dosenPengajar->where('prodi_id', $request->prodi);
        }

        // Terapkan filter berdasarkan periode jika dipilih
        if ($request->filled('periode')) {
            $dosenPengajar->whereHas('penilaianSISTER', function ($query) use ($request) {
                $query->where('periode_id', $request->periode);
            });
        }

        // Gunakan pagination untuk hasil query dosen
        $dosenPengajar = $dosenPengajar->paginate(10, ['*'], 'dosenPengajar_page');

        // Kirim data ke tampilan
        return view('pageadmin.penilaiansister.index', [
            'penilaianSister' => $penilaianSister,
            'dosenPengajar' => $dosenPengajar, // Dosen Pengajar dikembalikan
            'prodiList' => $prodiList,
            'periodeList' => $periodeList, // Kirim objek lengkap Periode ke tampilan
        ]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $dosen = Dosen::findOrFail($request->dosen_id);

        // Ambil daftar periode dari tabel `periode` dalam bentuk koleksi
        $periodeList = Periode::all();

        return view('pageadmin.penilaiansister.create', compact('dosen', 'periodeList'));
    }


    public function store(Request $request)
    {
        // Validasi data yang dikirimkan dari form
        $request->validate([
            'dosen_id' => 'required|exists:dosen,id',
            'periode_id' => 'required|exists:periode,id',
            'bidang_pendidikan' => 'required|in:1,2,3',
            'bidang_penelitian' => 'required|in:1,2,3',
            'bidang_pengabdian' => 'required|in:1,2,3',
            'bidang_penunjang' => 'required|in:1,2,3',
            'total_nilai' => 'required|numeric',
        ]);

        // Simpan Penilaian SISTER ke database
        PenilaianSISTER::create([
            'dosen_id' => $request->dosen_id,
            'periode_id' => $request->periode_id,
            'bidang_pendidikan' => $request->bidang_pendidikan,
            'bidang_penelitian' => $request->bidang_penelitian,
            'bidang_pengabdian' => $request->bidang_pengabdian,
            'bidang_penunjang' => $request->bidang_penunjang,
            'total_nilai' => $request->total_nilai,  // Menggunakan hasil perhitungan dari frontend
        ]);

        // Redirect kembali ke halaman penilaian dengan pesan sukses
        return redirect()->route('admin.penilaiansister.index')
            ->with('success', 'Data SISTER berhasil ditambahkan!');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Menampilkan detail data penilaian berdasarkan ID
        $penilaian = PenilaianPerilakuKerja::findOrFail($id);

        // Fetching the list of periods (Periode)
        $periodeList = Periode::all();  // Assuming 'Periode' is your model

        // Passing both penilaian and periodeList to the view
        return view('pageadmin.penilaiansister.show', compact('penilaian', 'periodeList'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Menampilkan form edit untuk data penilaian
        $penilaian = PenilaianPerilakuKerja::findOrFail($id);
        return view('pageadmin.penilaiansister.edit', compact('penilaian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'nama_kriteria' => 'required|string|max:255',
            'bobot' => 'required|numeric',
        ]);

        // Update data di database
        $penilaian = PenilaianPerilakuKerja::findOrFail($id);
        $penilaian->update($request->all());

        return redirect()->route('pageadmin.penilaiansister.index')
            ->with('success', 'Penilaian berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Mencari data dosen berdasarkan ID
        $dosen = Dosen::findOrFail($id);

        // Menghapus data penilaianBKD dan penilaianPerilakuKerja terkait dosen
        $dosen->penilaianBKD()->delete();
        $dosen->penilaianPerilakuKerja()->delete();

        // Menghapus data dosen itu sendiri
        $dosen->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('admin.penilaiansister.index')->with('success', 'Data berhasil dihapus');
    }

    public function reset(Request $request)
    {
        try {
            // Hapus semua data di tabel penilaian_sister
            DB::table('penilaian_sister')->truncate();

            // Clear filter session data
            $request->session()->forget('sister_filters');

            return redirect()->back()->with('success', 'Data penilaian SISTER berhasil direset');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mereset data: ' . $e->getMessage());
        }
    }
}
