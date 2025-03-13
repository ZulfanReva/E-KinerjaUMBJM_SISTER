<!DOCTYPE html>
<html lang="en">

<!-- Header -->
<x-headeradmin :title="'Beranda | E-Kinerja UMBJM'" />

<body class="g-sidenav-show  bg-gray-100">
    <x-navigasiadmin></x-navigasiadmin>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark"
                                href="javascript:;">Halaman</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Beranda</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Selamat Datang di halaman Beranda</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    </div>

                    <!-- Button Logout -->
                    <x-buttonlogout></x-buttonlogout>

                </div>
            </div>
        </nav>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <!-- Tombol di sebelah kanan -->
            <div class="d-flex justify-content-end">
                <!-- Tombol Filter -->
                <button class="btn btn-sm bg-gradient-info me-2" data-bs-toggle="modal" data-bs-target="#filterModal"
                    title="Filter Periode">
                    <i class="fa fa-filter" style="font-size:10px"></i> Filter Periode
                </button>
            </div>

            <div class="row">
                <!-- Dosen Aktif -->
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Dosen Aktif</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            {{ $dosenAktif }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                                        <img src="../assets/foto/dosenaktif.png" alt="dosen aktif" width="50"
                                            height="50">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Dosen Tugas Belajar -->
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Dosen Tugas Belajar</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            {{ $dosenTugasBelajar }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                                        <img src="../assets/foto/dosentugasbelajar.png" alt="dosen tugas belajar"
                                            width="50" height="50">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Fakultas -->
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Fakultas</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            6
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                                        <img src="../assets/foto/fakultas.png" alt="fakultas" width="50"
                                            height="50">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Prodi -->
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Prodi</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            {{ $jumlahProdi }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                                        <img src="../assets/foto/prodi.png" alt="prodi" width="50"
                                            height="50">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container-fluid py-4">
            <div class="row">
                <!-- Chart: Distribusi Grade Dosen -->
                <div class="col-12 mb-4">
                    <div class="card h-100">
                        <div class="card-header pb-0 p-3">
                            <h6 class="mb-0">
                                Distribusi Grade Dosen
                                @if ($selectedPeriode)
                                    - {{ $selectedPeriode->nama_periode }}
                                @endif
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <canvas id="dosenGradeChart"></canvas>
                            </div>
                            @if ($selectedPeriode && !empty($dosenByGrade) && array_sum($dosenByGrade) > 0)
                                <ul class="list-unstyled grade-list">
                                    <li>Grade A: {{ $dosenByGrade['A'] }}</li>
                                    <li>Grade B: {{ $dosenByGrade['B'] }}</li>
                                    <li>Grade C: {{ $dosenByGrade['C'] }}</li>
                                    <li>Grade D: {{ $dosenByGrade['D'] }}</li>
                                    <li>Grade E: {{ $dosenByGrade['E'] }}</li>
                                </ul>
                            @elseif ($selectedPeriode)
                                <p class="text-center">Periode yang dipilih belum memiliki Nilai</p>
                            @else
                                <p class="text-center">Silakan pilih periode untuk melihat distribusi grade</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CSS untuk mengatur ukuran chart dan daftar grade -->
        <style>
            .chart-container {
                position: relative;
                width: 100%;
                height: 300px;
                max-width: 1200px;
                margin: 0 auto;
            }

            .grade-list {
                display: flex;
                justify-content: space-between;
                /* Menjaga jarak antar item */
                padding: 0;
                margin-top: 10px;
                list-style: none;
                /* Menghapus bullet points */
                align-items: center;
                /* Memastikan item sejajar secara vertikal */
            }

            .grade-list li {
                flex: 1;
                /* Membagi ruang secara merata untuk setiap grade */
                text-align: center;
                /* Memusatkan teks di bawah setiap bar */
                margin-right: 0;
                /* Menghapus margin kanan karena flex sudah mengatur jarak */
            }

            /* Opsional: Menambahkan warna sesuai bar chart untuk konsistensi */
            .grade-list li:nth-child(1) {
                color: rgba(75, 192, 192, 1);
            }

            /* Grade A */
            .grade-list li:nth-child(2) {
                color: rgba(54, 162, 235, 1);
            }

            /* Grade B */
            .grade-list li:nth-child(3) {
                color: rgba(255, 206, 86, 1);
            }

            /* Grade C */
            .grade-list li:nth-child(4) {
                color: rgba(255, 159, 64, 1);
            }

            /* Grade D */
            .grade-list li:nth-child(5) {
                color: rgba(255, 99, 132, 1);
            }

            /* Grade E */
        </style>

        <!-- Modal Filter Periode -->
        <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="filterModalLabel">Filter Periode</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form action="{{ route('admin.periode.filter') }}" method="GET">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="filterPeriode" class="form-label">Pilih Periode</label>
                                <select class="form-select" id="filterPeriode" name="periode_id">
                                    <option value="">Pilih Periode</option>
                                    @foreach ($periodes as $periode)
                                        <option value="{{ $periode->id }}"
                                            {{ request('periode_id') == $periode->id ? 'selected' : '' }}>
                                            {{ $periode->nama_periode }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn bg-gradient-info">Terapkan Filter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="footer pt-3">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>,
                            created by <a href="#" class="font-weight-bold" target="_blank">Universitas
                                Muhammadiyah Banjarmasin</a>.
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Chart.js Script -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const dosenByGrade = @json($dosenByGrade);
            const ctx = document.getElementById('dosenGradeChart').getContext('2d');

            const dosenGradeChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Grade A', 'Grade B', 'Grade C', 'Grade D', 'Grade E'],
                    datasets: [{
                        label: 'Jumlah Dosen',
                        data: [dosenByGrade.A, dosenByGrade.B, dosenByGrade.C, dosenByGrade.D, dosenByGrade.E],
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.6)',
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 206, 86, 0.6)',
                            'rgba(255, 159, 64, 0.6)',
                            'rgba(255, 99, 132, 0.6)'
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 99, 132, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false, // Matikan rasio aspek default agar sesuai container
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Jumlah Dosen'
                            },
                            suggestedMax: 10,
                            ticks: {
                                stepSize: 1
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: ''
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        </script>
    </main>
</body>

</html>
