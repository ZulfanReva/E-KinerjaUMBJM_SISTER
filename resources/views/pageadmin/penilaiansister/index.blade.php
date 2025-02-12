<!DOCTYPE html>
<html lang="en">

<x-headeradmin :title="'Data SISTER | E-Kinerja UMBJM'" />

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
                                href="{{ route('admin.penilaiansister.index') }}">Beranda</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Data SISTER</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Selamat Datang di Halaman Data SISTER</h6>
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

        <!-- Modal Filter -->
        <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="filterModalLabel">Filter Penilaian</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="filterForm" method="GET" action="{{ route('admin.penilaiansister.index') }}">
                            <div class="mb-3">
                                <label for="prodi" class="form-label">Prodi</label>
                                <select class="form-select" id="prodi" name="prodi">
                                    <option value="">SEMUA PRODI</option>
                                    @foreach ($prodiList as $prodi)
                                        <option value="{{ $prodi->id }}">{{ $prodi->nama_prodi }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="mb-3">
                                <label for="periode" class="form-label">Periode</label>
                                <select class="form-select" id="periode" name="periode">
                                    <option value="">SEMUA PERIODE</option>
                                    @foreach ($periodeList as $id => $nama_periode)
                                        <option value="{{ $id }}">{{ $nama_periode }}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn bg-gradient-info">Filter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reset Confirmation Modal -->
        <div class="modal fade" id="resetModal" tabindex="-1" role="dialog" aria-labelledby="resetModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="resetModalLabel">Konfirmasi Reset Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin ingin mereset semua data filter? Pastikan kamu sudah merekap laporan penilaian
                        yang sudah ada sebelum memulai penilaian periode baru
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batal</button>
                        <form action="{{ route('admin.penilaiansister.reset') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn bg-gradient-info">Ya, Reset Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Menampilkan pesan sukses atau error -->
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif

        @if ($message = Session::get('error'))
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @endif

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                            <h6>Tabel Data SISTER</h6>
                            <div>
                                <!-- Button Filter -->
                                <button class="btn btn-sm bg-gradient-info me-2" data-bs-toggle="modal"
                                    data-bs-target="#filterModal" title="Filter Data">
                                    <i class="fa fa-filter" style="font-size:10px"></i> Filter
                                </button>
                                <!-- Button Reset -->
                                <button class="btn btn-sm bg-gradient-warning" data-bs-toggle="modal"
                                    data-bs-target="#resetModal" title="Reset Data">
                                    <i class="fa fa-refresh" style="font-size:10px"></i> Reset
                                </button>
                            </div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-start">
                                                Nama</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-start">
                                                NIDN</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-start">
                                                Prodi</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Status</th>
                                            @foreach ($periodeList as $periode)
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    {{ $periode->nama_periode }}
                                                </th>
                                            @endforeach
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse ($dosenPengajar as $dosen)
                                            <tr>
                                                <td class="text-start">
                                                    <h6 class="mb-0 text-sm">{{ $dosen->nama_dosen }}</h6>
                                                </td>
                                                <td class="text-start">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $dosen->nidn }}</p>
                                                </td>
                                                <td class="text-start">
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $dosen->prodi->nama_prodi ?? '-' }}</p>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span
                                                        class="badge bg-gradient-{{ $dosen->status === 'Aktif' ? 'success' : 'secondary' }} btn-sm mb-0">
                                                        {{ ucfirst($dosen->status) }}
                                                    </span>
                                                </td>

                                                @foreach ($periodeList as $periode)
                                                    @php
                                                        $penilaian = $dosen->penilaianSISTER
                                                            ->where('periode_id', $periode->id)
                                                            ->first();
                                                    @endphp
                                                    <td class="align-middle text-center">
                                                        @if ($penilaian)
                                                            <span>{{ $penilaian->total_nilai }}</span>
                                                        @else
                                                            <span>-</span>
                                                        @endif
                                                    </td>
                                                @endforeach

                                                <td class="align-middle text-center">
                                                    @php
                                                        $jumlahPeriode = $periodeList->count();
                                                        $jumlahPenilaian = $dosen->penilaianSISTER->count();
                                                        $isActive = $dosen->status === 'Aktif';
                                                        $hasAllPenilaian = $jumlahPeriode === $jumlahPenilaian;
                                                    @endphp

                                                    @if (!$isActive)
                                                        <!-- Jika dosen tidak aktif -->
                                                        <button class="btn bg-gradient-secondary btn-sm mb-0" disabled>
                                                            Nilai
                                                        </button>
                                                    @elseif ($hasAllPenilaian)
                                                        <!-- Jika dosen sudah dinilai di semua periode -->
                                                        <button class="btn bg-gradient-success btn-sm mb-0" disabled>
                                                            SUDAH DINILAI
                                                        </button>
                                                    @elseif ($dosen->penilaianSISTER->isNotEmpty())
                                                        <!-- Jika dosen sudah punya penilaian di periode tertentu -->
                                                        <a class="btn bg-gradient-danger btn-sm mb-0"
                                                            href="{{ route('admin.penilaiansister.create', ['dosen_id' => $dosen->id]) }}">
                                                            Tambah Nilai
                                                        </a>
                                                    @else
                                                        <!-- Jika dosen aktif dan belum ada penilaian -->
                                                        <a class="btn bg-gradient-danger btn-sm mb-0"
                                                            href="{{ route('admin.penilaiansister.create', ['dosen_id' => $dosen->id]) }}">
                                                            Nilai
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="{{ 4 + $periodeList->count() }}"
                                                    class="text-center text-secondary py-4">
                                                    <h6 class="mb-0">BELUM ADA DATA SISTER</h6>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>


                                <!-- Tambahkan Pagination -->
                                <section>
                                    <div class="container">
                                        <div class="row justify-content-center py-2">
                                            <!-- Pagination Dosen Berjabatan -->
                                            <div class="col-lg-4 mx-auto">
                                                {{ $dosenPengajar->appends(['dosenPengajar_page' => $dosenPengajar->currentPage()])->links('pagination::bootstrap-4') }}
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <style>
                                    .pagination {
                                        display: flex;
                                        justify-content: center;
                                        gap: 8px;
                                    }

                                    .pagination .page-item .page-link {
                                        color: #000;
                                        /* Warna teks default hitam */
                                        border: none;
                                        /* Hilangkan border */
                                        border-radius: 50%;
                                        /* Bentuk lingkaran */
                                        padding: 8px 12px;
                                        text-align: center;
                                        transition: background-color 0.3s ease, color 0.3s ease;
                                        /* Animasi */
                                    }

                                    .pagination .page-item.active .page-link {
                                        background-image: linear-gradient(310deg, #2152ff 0%, #21d4fd 100%);
                                        /* Gradient aktif */
                                        color: #fff !important;
                                        /* Warna font putih */
                                    }

                                    .pagination .page-item .page-link:hover {
                                        background-image: linear-gradient(310deg, #2152ff 0%, #21d4fd 100%);
                                        /* Gradient saat hover */
                                        color: #fff;
                                        /* Warna font hover */
                                    }
                                </style>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            let selectedDataId = null;

            // Fungsi untuk menampilkan modal konfirmasi
            function hapusData(id) {
                selectedDataId = id; // Menyimpan ID data yang akan dihapus
                const modal = new bootstrap.Modal(document.getElementById('confirmDeleteModal')); // Inisialisasi modal
                modal.show(); // Menampilkan modal
            }

            // Menangani klik tombol "Ya" pada modal
            document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
                const dataId = selectedDataId; // Mengambil ID data yang dipilih

                // Logika penghapusan data bisa ditambahkan di sini (misalnya melalui AJAX)
                alert("Data dengan ID " + dataId + " berhasil dihapus.");

                // Menutup modal
                const modal = bootstrap.Modal.getInstance(document.getElementById('confirmDeleteModal'));
                modal.hide();

                // Redirect atau perbarui halaman
                window.location.href = "penilaiansister.html"; // Atau sesuaikan dengan kebutuhan
            });
        </script>

    </main>
</body>

</html>
