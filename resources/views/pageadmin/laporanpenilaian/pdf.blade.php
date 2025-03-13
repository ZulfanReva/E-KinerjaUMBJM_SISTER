<!-- resources/views/pageadmin/penilaianprofilematching/pdf.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Penilaian Perilaku Kerja</title>
    <style>
        body {
            font-family: 'Times New Roman';
            font-size: 12px;
            color: black;
        }

        .letterhead {
            text-align: center;
            margin-bottom: 30px;
        }

        .letterhead img {
            height: 80px;
            display: block;
            margin: 0 auto 10px auto;
        }

        .letterhead hr {
            border: 1px solid black;
            margin: 0 0 30px 0;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h2,
        .header h3 {
            margin: 10px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            table-layout: fixed;
            /* Lebar kolom tetap */
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 11px;
            word-wrap: break-word;
            /* Teks panjang turun ke bawah */
            overflow-wrap: break-word;
            white-space: normal;
            /* Wrap alami */
        }

        /* Lebar kolom spesifik */
        th:nth-child(1),
        td:nth-child(1) {
            width: 5%;
        }

        /* No */
        th:nth-child(2),
        td:nth-child(2) {
            width: 25%;
        }

        /* Nama Dosen */
        th:nth-child(3),
        td:nth-child(3) {
            width: 15%;
        }

        /* NIDN */
        th:nth-child(4),
        td:nth-child(4) {
            width: 20%;
        }

        /* Prodi */
        th:nth-child(5),
        td:nth-child(5) {
            width: 10%;
        }

        /* Status */
        th:nth-child(6),
        td:nth-child(6) {
            width: 15%;
        }

        /* Periode */
        th:nth-child(7),
        td:nth-child(7) {
            width: 10%;
        }

        /* Total Nilai */

        th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            font-size: 10px;
            padding: 10px 0;
        }

        .export-info {
            text-align: center;
            font-size: 10px;
            margin-bottom: 10px;
        }

        .signature {
            margin-top: 30px;
            text-align: right;
            padding-right: 10px;
        }

        .signature p {
            margin: 5px 0;
        }

        .signature img {
            height: 100px;
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <!-- Halaman 1: Surat Keputusan -->

    <!-- Logo dan Garis -->
    <div class="letterhead" style="margin-bottom: -10px;">
        <img src="{{ $kopBase64 }}" alt="Logo">
        <hr>
    </div>

    <!-- Header Text -->
    <div class="header" style="margin-bottom: -10px;">
        <h2 style="margin-bottom: -5px;">REKAP PENILAIAN KINERJA DOSEN</h2>
        <h3 style="margin-bottom: -5px;">UNIVERSITAS MUHAMMADIYAH BANJARMASIN</h3>
        <h4 style="margin-bottom: -1-px;">PERIODE: {{ $periodeFilter ?? 'SEMUA PERIODE' }}</h4>
    </div>


    <div class="surat-keputusan" style="page-break-after: always;">
        <h4>Surat Keputusan</h4>
        <p>Nomor : .../UMBJM-SDI/2025</p>
        <p>Tentang: Rekap Penilaian Kinerja Dosen Periode</p>
        <p>Kepada Yth,</p>
        <p>Para Dosen Universitas Muhammadiyah Banjarmasin</p>
        <p style="text-align: justify">Dengan ini kami menyampaikan hasil rekapitulasi penilaian kinerja dosen
            berdasarkan nilai SISTER untuk
            periode {{ $periodeFilter ?? 'SEMUA PERIODE' }}. Evaluasi ini dilakukan guna meningkatkan mutu pendidikan
            serta memberikan apresiasi yang sesuai dengan pencapaian masing-masing dosen. Berikut adalah kategori
            penilaian dan reward atau sanksi yang diberikan sesuai dengan hasil evaluasi:</p>

        <h5>Kategori dan Reward/Sanksi:</h5>
        <ul style="text-align: justify">
            <li><b>Grade A (Sangat Baik)</b>: Pujian dalam forum rapat resmi, Sertifikat keberhasilan, Piagam
                penghargaan,
                Tugas belajar atau studi lanjut (di dalam/luar negeri) atas biaya universitas,
                Loncat jabatan fungsional atau kenaikan pangkat istimewa, Publikasi atas biaya universitas.</li>
            <li><b>Grade B (Baik)</b>: Pujian dalam forum rapat resmi, Ucapan terima kasih secara formal,
                Sertifikat keberhasilan, Pembebasan SPP untuk pendidikan lanjutan,
                Tugas belajar (tergantung keputusan universitas).</li>
            <li><b>Grade C (Cukup)</b>: Pujian dalam forum rapat resmi (hanya jika dianggap cukup memadai),
                Teguran lisan (jika dianggap perlu perbaikan),
                Teguran tertulis (untuk dorongan peningkatan kinerja ke depannya).</li>
            <li><b>Grade D (Kurang)</b>: Teguran lisan atau tertulis, Peringatan keras,
                Penundaan kenaikan gaji berkala, Penundaan kenaikan pangkat.</li>
            <li><b>Grade E (Sangat Kurang)</b>: Peringatan keras, Pembebasan tugas,
                Penundaan kenaikan gaji berkala, Penundaan kenaikan pangkat,
                Pemberhentian jika tidak ada perbaikan signifikan.</li>
        </ul>

        <p>Lampiran berikut mencantumkan daftar dosen berdasarkan kategori penilaiannya. Demikian hasil evaluasi ini
            disampaikan.</p>

        <div class="signature">
            <p>Barito Kuala, {{ date('d/m/Y') }}</p>
            <p>Kepala Bagian SDI</p>
            <img src="{{ $ttdBase64 }}" alt="Tanda Tangan">
            <p>Bapak Wahyudin</p>
        </div>
    </div>

    <!-- Halaman 2: Data Dosen -->
    <div class="data-dosen">
        <!-- Logo dan Garis -->
        <div class="letterhead" style="margin-bottom: -10px;">
            <img src="{{ $kopBase64 }}" alt="Logo">
            <hr>
        </div>

        <!-- Header Text -->
        <div class="header" style="margin-bottom: -10px;">
            <h2 style="margin-bottom: -5px;">REKAP PENILAIAN PERILAKU KERJA DOSEN</h2>
            <h3 style="margin-bottom: -5px;">UNIVERSITAS MUHAMMADIYAH BANJARMASIN</h3>
            <h4 style="margin-bottom: -1-px;">PERIODE: {{ $periodeFilter ?? 'SEMUA PERIODE' }}</h4>
        </div>

        <!-- Tabel Penilaian Dosen Berdasarkan Grade -->
        @foreach (['A', 'B', 'C', 'D', 'E'] as $grade)
            <h4>Grade {{ $grade }}</h4>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Dosen</th>
                        <th>NIDN</th>
                        <th>Prodi</th>
                        <th>Status</th>
                        <th>Periode</th>
                        <th>Total Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $nomorUrut = 1;
                        $filteredData = $penilaianSister->filter(function ($penilaian) use ($grade) {
                            return ($penilaian->total_nilai >= 4.2 && $grade === 'A') ||
                                ($penilaian->total_nilai >= 3.5 && $penilaian->total_nilai < 4.2 && $grade === 'B') ||
                                ($penilaian->total_nilai >= 2.7 && $penilaian->total_nilai < 3.5 && $grade === 'C') ||
                                ($penilaian->total_nilai >= 1.8 && $penilaian->total_nilai < 2.7 && $grade === 'D') ||
                                ($penilaian->total_nilai < 1.8 && $grade === 'E');
                        });
                    @endphp
                    @forelse($filteredData as $penilaian)
                        <tr>
                            <td>{{ $nomorUrut++ }}</td>
                            <td>{{ $penilaian->dosen->nama_dosen }}</td>
                            <td>{{ $penilaian->dosen->nidn }}</td>
                            <td>{{ $penilaian->dosen->prodi->nama_prodi ?? '-' }}</td>
                            <td>Aktif</td>
                            <td>{{ $penilaian->periode->nama_periode ?? '-' }}</td>
                            <td>{{ number_format($penilaian->total_nilai, 2) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="text-align: center;">Tidak ada data penilaian untuk grade
                                {{ $grade }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- <div style="page-break-after: always;"></div> --}}
        @endforeach
    </div>
</body>


</html>
