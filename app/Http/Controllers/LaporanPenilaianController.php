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
            // Ambil data penilaian_sister dengan relasi dosen dan periode
            $penilaian = PenilaianSISTER::with(['dosen', 'periode'])->findOrFail($id);

            // Ambil nilai untuk bidang-bidang dalam penilaian_sister
            $bidangPendidikan = $penilaian->bidang_pendidikan ?? '-';
            $bidangPenelitian = $penilaian->bidang_penelitian ?? '-';
            $bidangPengabdian = $penilaian->bidang_pengabdian ?? '-';
            $bidangPenunjang = $penilaian->bidang_penunjang ?? '-';

            // Hitung total nilai
            $nilaiSisterValue = floatval($penilaian->total_nilai ?? 0);

            // Tentukan grade berdasarkan nilai total
            $grade = $nilaiSisterValue >= 4.75 ? 'A' : ($nilaiSisterValue >= 3.75
                ? 'B' : ($nilaiSisterValue >= 2.75
                    ? 'C' : ($nilaiSisterValue >= 1.75
                        ? 'D' : 'E')));

            // Tentukan kesimpulan berdasarkan grade
            $kesimpulan = [];
            if ($grade === 'A') {
                $kesimpulan = [
                    'Pujian dalam forum rapat resmi',
                    'Loncat jabatan fungsional atau kenaikan pangkat istimewa *Syarat & Ketentuan oleh SDI',
                    'Tugas belajar atau studi lanjut di luar negeri atas biaya universitas *Syarat & Ketentuan oleh SDI',
                ];
            } elseif ($grade === 'B') {
                $kesimpulan = [
                    'Pujian dalam forum rapat resmi',
                    'Sertifikat keberhasilan atau ucapan terima kasih secara formal',
                    'Pembebasan SPP untuk pendidikan lanjutan di dalam negeri *Syarat & Ketentuan oleh SDI',
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
                    'Penundaan kenaikan gaji berkala *Syarat & Ketentuan oleh SDI',
                ];
            } else {
                $kesimpulan = [
                    'Peringatan keras',
                    'Pembebasan tugas *Syarat & Ketentuan oleh SDI',
                    'Penundaan kenaikan gaji berkala',
                    'Pemberhentian jika tidak ada perbaikan signifikan *Syarat & Ketentuan oleh SDI',
                ];
            }

            // Menambahkan kesimpulan ke objek penilaian
            $penilaian->kesimpulan = $kesimpulan;

            // Menambahkan total nilai dan grade ke objek penilaian
            $penilaian->total_nilai_calculated = number_format($nilaiSisterValue, 2);
            $penilaian->grade = $grade;

            // Kirim data ke tampilan dengan data yang diperbaiki
            return view('pageadmin.laporanpenilaian.show', compact('penilaian', 'bidangPendidikan', 'bidangPenelitian', 'bidangPengabdian', 'bidangPenunjang'));
        } catch (\Exception $e) {
            // Jika data tidak ditemukan, redirect dengan pesan error
            return redirect()->route('admin.laporanpenilaian.index')
                ->with('error', 'Data penilaian tidak ditemukan.');
        }
    }


    public function exportPDF(Request $request)
    {
        // Ambil data penilaian SISTER dengan relasi dosen dan periode
        $query = PenilaianSISTER::with(['dosen.prodi', 'periode']);

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

        $penilaianSister = $query->get();

        // Tambahkan perhitungan grade ke setiap data
        $penilaianSister->each(function ($penilaian) {
            $nilaiSister = floatval($penilaian->total_nilai ?? 0);
            $penilaian->grade =
                $nilaiSister >= 4.75 ? 'A' : ($nilaiSister >= 3.75 ? 'B' : ($nilaiSister >= 2.75 ? 'C' : ($nilaiSister >= 1.75 ? 'D' : 'E')));
        });

        // Sorting berdasarkan nilai total dan grade
        $gradeOrder = ['A' => 1, 'B' => 2, 'C' => 3, 'D' => 4, 'E' => 5];
        $penilaianSister = $penilaianSister->sortByDesc(function ($penilaian) use ($gradeOrder) {
            return [$penilaian->total_nilai, $gradeOrder[$penilaian->grade]];
        });

        // Encode gambar kop surat dan tanda tangan
        $kopImage = base64_encode(file_get_contents(public_path('assets/foto/kopsurat.png')));
        $ttdImage = base64_encode(file_get_contents(public_path('assets/foto/ttddigital.png')));

        $pdf = PDF::loadView('pageadmin.laporanpenilaian.pdf', [
            'penilaianSister' => $penilaianSister,
            'exportDate' => Carbon::now()->format('d-m-Y H:i:s'),
            'kopBase64' => 'data:image/png;base64,' . $kopImage,
            'ttdBase64' => 'data:image/png;base64,' . $ttdImage,
            'periodeFilter' => $periodeFilter
        ]);

        $pdf->getDomPDF()->set_option('isRemoteEnabled', true);
        $pdf->getDomPDF()->set_option('isHtml5ParserEnabled', true);

        return $pdf->download('laporan-penilaian-sister-' . Carbon::now()->format('Y-m-d') . '.pdf');
    }
}
