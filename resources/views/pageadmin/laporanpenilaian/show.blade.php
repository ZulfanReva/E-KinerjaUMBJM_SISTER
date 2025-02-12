<!DOCTYPE html>
<html lang="en">

<x-headeradmin :title="'Detail Penilaian | E-Kinerja UMBJM'" />

<head>
    <style>
        @media print {

            body,
            html {
                margin: 0;
                padding: 0;
                width: 100%;
                height: 100vh;
                overflow: visible;
            }

            .x-headeradmin,
            .btn,
            .x-navigasiadmin,
            .main-content> :not(.container-fluid) {
                display: none !important;
            }

            .card {
                border: none;
                box-shadow: none;
                margin: 0;
                padding: 0;
            }

            .card-body {
                padding: 15px;
                font-size: 10pt;
                line-height: 1.3;
            }

            .table-bordered {
                margin-bottom: 0px;
                font-size: 9pt;
            }

            .table-bordered td,
            .table-bordered th {
                padding: 4px 6px;
                border: 1px solid #000 !important;
            }

            h6.text-uppercase {
                font-size: 11pt;
                margin: 10px 0 5px 0;
            }

            .row {
                margin-bottom: 10px;
            }

            .row.mb-2 {
                margin-bottom: 8px;
            }

            .col-md-6 {
                width: 48%;
                float: left;
                margin-right: 2%;
            }

            ul {
                margin: 5px 0;
                padding-left: 20px;
            }

            li {
                font-size: 9pt;
                line-height: 1.3;
                margin-bottom: 2px;
            }

            .text-end {
                margin-top: 15px;
                clear: both;
            }

            .text-end p {
                margin: 3px 0;
            }

            .text-end img {
                height: 80px;
                margin: 5px 0;
            }

            @page {
                size: A4;
                margin: 1cm;
                /* Atur margin sesuai kebutuhan */
            }

            .container-fluid {
                transform-origin: top left;
                transform: scale(0.95);
            }

            img {
                max-width: 100%;
                height: auto;
            }

            .card-body {
                page-break-before: avoid;
                page-break-after: avoid;
            }

            .card-header img {
                height: 70px;
                margin-bottom: -50px;
            }
        }
    </style>
</head>

<body class="g-sidenav-show bg-gray-100">
    <x-navigasiadmin></x-navigasiadmin>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Header -->
        <div class="container-fluid py-4">
            <div class="d-flex justify-content-end align-items-center mb-3">
                <div>
                    <button class="btn btn-secondary" onclick="window.history.back()">Kembali</button>
                    <button class="btn bg-gradient-info" onclick="window.print()">
                        <i class="fa fa-print" style="font-size:10px"></i> Cetak
                    </button>
                </div>
            </div>

            <div class="card">
                {{-- <div class="card-header text-start">
                    <img src="{{ asset('assets/foto/kopsurat.png') }}" alt="Logo"
                        style="height: 80px; margin-bottom: -70px;">
                </div> --}}

                <!-- Logo dan Garis -->
                <div class="letterhead" style="text-align: center; margin-bottom: 5px;">
                    <img src="{{ asset('assets/foto/kopsurat.png') }}" alt="Logo">
                </div>


                <!-- Header Text -->
                <div class="header" style="text-align: center; margin-bottom: 0px;">
                    <h2 style="margin-bottom: -5px; font-size: 16pt;">LAPORAN PENILAIAN KINERJA DOSEN</h2>
                    <h3 style="margin-bottom: -5px; font-size: 14pt;">UNIVERSITAS MUHAMMADIYAH BANJARMASIN</h3>
                    {{-- <h4 style="margin-bottom: -1px; font-size: 12pt;">PERIODE: {{ $periodeFilter ?? 'SEMUA PERIODE' }} --}}
                    </h4>
                </div>


                <div class="card-body">
                    <style>
                        /* Styling Khusus untuk card-body */
                        .card-body {
                            font-family: 'Times New Roman', Times, serif;
                            color: black;
                        }

                        /* Styling Tabel dalam card-body */
                        .card-body .table-bordered {
                            border-collapse: collapse;
                            width: 100%;
                            table-layout: fixed;
                            margin-bottom: 0;
                            /* Menghilangkan jarak bawah yang lebih besar */
                        }

                        .card-body .table-bordered th,
                        .card-body .table-bordered td {
                            border: 1px solid black !important;
                            padding: 5px;
                            /* Mengurangi padding agar tabel lebih rapat */
                            text-align: left;
                            word-wrap: break-word;
                            max-width: 200px;
                            overflow-wrap: break-word;
                            white-space: normal;
                            color: black;
                            /* Font hitam untuk tabel */
                        }

                        .card-body .table-bordered tr:last-child td {
                            border-bottom: 1px solid black !important;
                        }

                        /* Menyesuaikan jarak antar elemen di dalam .card-body */
                        .card-body .row.mb-2 {
                            margin-bottom: 10px;
                            /* Atur jarak antar row */
                        }

                        .card-body .col-md-6,
                        .card-body .col-md-12 {
                            padding-right: 5px;
                            padding-left: 5px;
                        }

                        /* Penyesuaian pada header dan isi tabel agar serasi */
                        .card-body .custom-font td {
                            max-width: 100%;
                            min-width: 100px;
                            overflow-wrap: anywhere;
                            padding: 6px;
                            /* Padding sedikit lebih besar */
                        }

                        /* Hasil perhitungan dan kesimpulan, pastikan tetap konsisten */
                        .card-body .kesimpulan ul {
                            margin-top: 0;
                            padding-left: 1.5rem;
                            list-style-type: disc;
                            margin-bottom: 0;
                        }

                        .card-body .kesimpulan h6 {
                            margin-bottom: 0.5rem;
                        }

                        /* Responsif: Sesuaikan dengan ukuran layar lebih kecil */
                        @media (max-width: 768px) {

                            .card-body .table-bordered th,
                            .card-body .table-bordered td {
                                padding: 4px;
                            }

                            .card-body .col-md-6,
                            .card-body .col-md-12 {
                                flex: 1;
                                min-width: 100%;
                                margin-bottom: 15px;
                                /* Jarak antar elemen pada tampilan kecil */
                            }
                        }
                    </style>

                    <!-- Data Dosen -->
                    <div class="row mb-2 custom-font">
                        <div class="col-md-6">
                            <h6 class="text-uppercase text-sm">Profil Dosen</h6>
                            <table class="table table-bordered custom-font">
                                <tr>
                                    <td>Nama</td>
                                    <td>{{ $penilaian->dosen->nama_dosen }}</td>
                                </tr>
                                <tr>
                                    <td>NIDN</td>
                                    <td>{{ $penilaian->dosen->nidn }}</td>
                                </tr>
                                <tr>
                                    <td>Prodi</td>
                                    <td>{{ $penilaian->dosen->prodi->nama_prodi ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>{{ $penilaian->dosen->status ?? '-' }}</td>
                                </tr>
                            </table>
                        </div>

                        <div class="col-md-6">
                            <h6 class="text-uppercase text-sm">PENILAIAN SISTER</h6>
                            <table class="table table-bordered custom-font">
                                <tbody>
                                    <tr>
                                        <td class="text-start">Bidang Pendidikan</td>
                                        <td class="text-center">{{ $bidangPendidikan }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-start">Bidang Penelitian</td>
                                        <td class="text-center">{{ $bidangPenelitian }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-start">Bidang Pengabdian</td>
                                        <td class="text-center">{{ $bidangPengabdian }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-start">Bidang Penunjang</td>
                                        <td class="text-center">{{ $bidangPenunjang }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <!-- Hasil Perhitungan -->
                    <div class="row mb-2 custom-font">
                        <div class="col-md-6">
                            <h6 class="text-uppercase text-sm">Hasil Perhitungan</h6>
                            <table class="table table-bordered custom-font">
                                <thead>
                                    <tr>
                                        <th class="text-center">Total Nilai</th>
                                        <th class="text-center">Grade</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">{{ $penilaian->total_nilai_calculated }}</td>
                                        <td class="text-center">{{ $penilaian->grade }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Kesimpulan -->
                    <div class="row mb-2 custom-font">
                        <div class="col-md-12">
                            <h6 class="text-uppercase text-sm">Kesimpulan</h6>
                            <ul>
                                @foreach ($penilaian->kesimpulan as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Penutupan -->
                    <div class="text-end custom-font" style="line-height: 1.2;">
                        <p style="margin-bottom: 2px;">Barito Kuala, {{ date('d/m/Y') }}</p>
                        <p style="margin-bottom: 2px;">Kepala Bagian SDI</p>
                        <img src="{{ asset('assets/foto/ttddigital.png') }}" alt="Tanda Tangan" style="height: 80px;">
                        <p style="margin-top: 2px;">Bapak Wahyudin</p>
                    </div>
                </div>
            </div>

    </main>
</body>

</html>
