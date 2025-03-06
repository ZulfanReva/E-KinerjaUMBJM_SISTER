<!DOCTYPE html>
<html lang="en">

<x-headeradmin :title="'Form Data SISTER | E-Kinerja UMBJM'" />

<body class="g-sidenav-show bg-gray-100">
    <x-navigasiadmin></x-navigasiadmin>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark"
                                href="{{ route('admin.penilaiansister.index') }}">Form Data SISTER</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Data SISTER</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Selamat Datang di Halamanan Form Data SISTER</h6>
                </nav>
            </div>
        </nav>
        <!-- End Navbar -->

        <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
            <div class="container-fluid">
                <div class="page-header min-height-300 border-radius-xl mt-4"
                    style="background-image: url('{{ asset('assets/foto/bginputpk.png') }}'); background-position-y: 50%;">
                    <span class="mask bg-gradient-info opacity-6"></span>
                </div>

                <div class="card card-body blur shadow-blur mx-4 mt-4 overflow-hidden">
                    <form id="formDataSISTER" action="{{ route('admin.penilaiansister.store') }}" method="POST">
                        @csrf
                        <h6 class="text-center text-info mb-4 font-weight-bold">FORM PENILAIAN DATA SISTER</h6>

                        <!-- Profil Dosen -->
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="font-weight-bold text-info">Profil Dosen</h6>
                                <div class="form-group">
                                    <label for="nama-dosen">Nama Dosen</label>
                                    <input type="text" class="form-control" id="nama-dosen"
                                        value="{{ $dosen->nama_dosen }}" readonly>
                                    <input type="hidden" name="dosen_id" value="{{ $dosen->id }}">
                                </div>
                                <div class="form-group">
                                    <label for="nidn">NIDN</label>
                                    <input type="text" class="form-control" id="nidn"
                                        value="{{ $dosen->nidn }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="prodi">Prodi</label>
                                    <input type="text" class="form-control" id="prodi"
                                        value="{{ $dosen->prodi->nama_prodi }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <input type="text" class="form-control" id="status"
                                        value="{{ $dosen->status }}" readonly>
                                </div>
                            </div>

                            <!-- Waktu Penilaian -->
                            <div class="col-md-6">
                                <h6 class="font-weight-bold text-info">Periode Penilaian</h6>
                                <div class="form-group">
                                    <label for="periode" class="form-label">Periode</label>
                                    <select name="periode_id" class="form-select" required>
                                        <option value="" selected disabled>Pilih Periode</option>
                                        @foreach ($periodeList as $periode)
                                            <option value="{{ $periode->id }}">{{ $periode->nama_periode }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Data SISTER -->
                        <div class="row mt-4">
                            <h6 class="font-weight-bold text-info text-center">DATA SISTER</h6>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bidang-pendidikan">Bidang Pendidikan</label>
                                    <select class="form-select" id="bidang-pendidikan" name="bidang_pendidikan"
                                        onchange="hitungNilaiSISTER()">
                                        <option value="">Pilih Nilai</option>
                                        <option value="1">1 (Tidak Memenuhi)</option>
                                        <option value="2">2 (Memenuhi)</option>
                                        <option value="3">3 (Memenuhi Lebih)</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="bidang-penelitian">Bidang Penelitian</label>
                                    <select class="form-select" id="bidang-penelitian" name="bidang_penelitian"
                                        onchange="hitungNilaiSISTER()">
                                        <option value="">Pilih Nilai</option>
                                        <option value="1">1 (Tidak Memenuhi)</option>
                                        <option value="2">2 (Memenuhi)</option>
                                        <option value="3">3 (Memenuhi Lebih)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bidang-pengabdian">Bidang Pengabdian</label>
                                    <select class="form-select" id="bidang-pengabdian" name="bidang_pengabdian"
                                        onchange="hitungNilaiSISTER()">
                                        <option value="">Pilih Nilai</option>
                                        <option value="1">1 (Tidak Memenuhi)</option>
                                        <option value="2">2 (Memenuhi)</option>
                                        <option value="3">3 (Memenuhi Lebih)</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="bidang-penunjang">Bidang Penunjang</label>
                                    <select class="form-select" id="bidang-penunjang" name="bidang_penunjang"
                                        onchange="hitungNilaiSISTER()">
                                        <option value="">Pilih Nilai</option>
                                        <option value="1">1 (Tidak Memenuhi)</option>
                                        <option value="2">2 (Memenuhi)</option>
                                        <option value="3">3 (Memenuhi Lebih)</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Kolom untuk Total Nilai SISTER -->
                        <div class="row mt-4">
                            <h6 class="font-weight-bold text-info text-center">TOTAL NILAI</h6>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="total-nilai">Total Nilai</label>
                                    <input type="text" class="form-control" id="total-nilai" name="total_nilai"
                                        readonly>
                                </div>
                            </div>
                        </div>

                        <!-- Input tersembunyi untuk total_nilai -->
                        <input type="hidden" name="total_nilai" id="total-nilai-input">


                        <div class="row mt-4">
                            <div class="col-12 text-end">
                                <button type="button" class="btn btn-outline-secondary"
                                    onclick="window.location.href='{{ route('admin.penilaiansister.index') }}'">Kembali</button>
                                <button type="button" id="submitBtn"
                                    class="btn bg-gradient-info me-2">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Konfirmasi -->
        <div class="modal fade" id="confirmSaveModal" tabindex="-1" aria-labelledby="confirmSaveModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmSaveModalLabel">Konfirmasi Simpan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin ingin menyimpan data ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="cancelBtn"
                            data-bs-dismiss="modal">Batal</button>
                        <button type="button" id="confirmSaveBtn" class="btn bg-gradient-info">Ya, Simpan</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function hitungNilaiSISTER() {
                // Inisialisasi Nilai Standar
                const standar = {
                    "bidang-pendidikan": 2,
                    "bidang-penelitian": 2,
                    "bidang-pengabdian": 2,
                    "bidang-penunjang": 2
                };

                // Inisialisasi Bobot berdasarkan selisih (gap)
                // Bobot Core: Pola selisih 2 untuk dominasi Core Factors
                const bobotCore = {
                    "-1": 1, // Tidak memenuhi
                    "0": 3, // Memenuhi
                    "1": 5 // Memenuhi berlebih
                };
                // Bobot Secondary: Disesuaikan agar total maksimum 4.7, Core tetap dominan
                const bobotSecondary = {
                    "-1": 1, // Tidak memenuhi
                    "0": 3, // Memenuhi
                    "1": 4 // Memenuhi berlebih
                };

                // Daftar Kriteria Core Factor dan Secondary Factor
                const coreFactors = [
                    "bidang-pendidikan",
                    "bidang-penelitian",
                    "bidang-pengabdian"
                ];
                const secondaryFactors = [
                    "bidang-penunjang"
                ];

                // Perhitungan Nilai
                let totalCore = 0;
                let totalSecondary = 0;
                let semuaTerisi = true;

                // Cek apakah semua dropdown sudah dipilih
                [...coreFactors, ...secondaryFactors].forEach(function(key) {
                    const nilaiElement = document.getElementById(key);
                    if (!nilaiElement || nilaiElement.value === "") {
                        semuaTerisi = false;
                    }
                });

                // Jika semua dropdown terisi, hitung Total Nilai SISTER
                if (semuaTerisi) {
                    // Hitung Nilai Core Factor (NCF)
                    coreFactors.forEach(function(key) {
                        const nilaiElement = document.getElementById(key);
                        const nilaiInt = parseInt(nilaiElement.value);
                        const gap = nilaiInt - standar[key];
                        if (bobotCore[gap] !== undefined) {
                            totalCore += bobotCore[gap];
                        }
                    });
                    const NCF = totalCore / coreFactors.length;

                    // Hitung Nilai Secondary Factor (NSF)
                    secondaryFactors.forEach(function(key) {
                        const nilaiElement = document.getElementById(key);
                        const nilaiInt = parseInt(nilaiElement.value);
                        const gap = nilaiInt - standar[key];
                        if (bobotSecondary[gap] !== undefined) {
                            totalSecondary += bobotSecondary[gap];
                        }
                    });
                    const NSF = totalSecondary / secondaryFactors.length;

                    // Hitung Total Nilai (70% NCF + 30% NSF)
                    const totalNilai = (0.7 * NCF) + (0.3 * NSF);
                    const totalNilaiRounded = parseFloat(totalNilai.toFixed(2));

                    // Tentukan Grade
                    const grade =
                        totalNilaiRounded >= 4.2 ? 'A' :
                        totalNilaiRounded >= 3.5 ? 'B' :
                        totalNilaiRounded >= 2.7 ? 'C' :
                        totalNilaiRounded >= 1.8 ? 'D' : 'E';

                    // Jika total nilai lebih rendah dari 1.8, tetapkan nilai 0 (opsional, sesuai kebutuhan)
                    if (totalNilaiRounded < 1.8) {
                        document.getElementById("total-nilai").value = "0";
                        document.getElementById("total-nilai-input").value = "0";
                        document.getElementById("grade-display").textContent = "Grade: E";
                    } else {
                        document.getElementById("total-nilai").value = totalNilaiRounded;
                        document.getElementById("total-nilai-input").value = totalNilaiRounded;
                        document.getElementById("grade-display").textContent = "Grade: " + grade;
                    }

                    return true;
                } else {
                    // Kosongkan Total Nilai SISTER dan Grade jika belum semua terisi
                    document.getElementById("total-nilai").value = "";
                    document.getElementById("total-nilai-input").value = "";
                    document.getElementById("grade-display").textContent = "Grade: -";
                    return false;
                }
            }

            // Tambahkan event listener ke semua dropdown untuk perhitungan real-time
            document.addEventListener('DOMContentLoaded', function() {
                const allFactors = [
                    "bidang-pendidikan",
                    "bidang-penelitian",
                    "bidang-pengabdian",
                    "bidang-penunjang"
                ];

                allFactors.forEach(function(id) {
                    const dropdown = document.getElementById(id);
                    if (dropdown) {
                        dropdown.addEventListener('change', hitungNilaiSISTER);
                    }
                });

                // Validasi form sebelum submit
                const form = document.getElementById("formDataSISTER");
                form.addEventListener("submit", function(e) {
                    const allFilled = allFactors.every(id => document.getElementById(id).value !== "");
                    if (!allFilled) {
                        e.preventDefault();
                        alert("Harap lengkapi semua kolom!");

                        // Tandai field yang kosong
                        allFactors.forEach(id => {
                            const dropdown = document.getElementById(id);
                            if (dropdown.value === "") {
                                dropdown.classList.add('is-invalid');
                            } else {
                                dropdown.classList.remove('is-invalid');
                            }
                        });
                        return;
                    }

                    // Pastikan perhitungan Total nilai SISTER dilakukan sebelum submit
                    if (!hitungNilaiSISTER()) {
                        e.preventDefault();
                        alert("Gagal menghitung Total Nilai SISTER!");
                    }
                });

                // Ganti tombol submit biasa dengan event listener
                const submitBtn = document.getElementById("submitBtn");
                submitBtn.addEventListener("click", function() {
                    form.submit();
                });
            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const form = document.getElementById('formDataSISTER'); // Form
                const submitBtn = document.getElementById('submitBtn'); // Tombol Simpan
                const confirmSaveBtn = document.getElementById('confirmSaveBtn'); // Tombol Simpan di modal
                const cancelBtn = document.getElementById('cancelBtn'); // Tombol Batal di modal
                const modalElement = document.getElementById('confirmSaveModal'); // Modal
                const modal = new bootstrap.Modal(modalElement); // Inisialisasi modal Bootstrap

                // Event listener untuk tombol "Simpan"
                submitBtn.addEventListener('click', function(e) {
                    e.preventDefault(); // Mencegah form untuk langsung disubmit
                    if (form.checkValidity()) {
                        modal.show(); // Tampilkan modal konfirmasi jika form valid
                    } else {
                        form.reportValidity(); // Tampilkan error validasi form jika belum valid
                    }
                });

                // Event listener untuk tombol "Simpan" di modal konfirmasi
                confirmSaveBtn.addEventListener('click', function() {
                    modal.hide(); // Sembunyikan modal setelah tombol Simpan diklik
                    form.submit(); // Kirimkan form untuk disimpan
                });

                // Event listener untuk tombol "Batal" di modal konfirmasi
                cancelBtn.addEventListener('click', function() {
                    modal.hide(); // Menutup modal jika tombol Batal diklik
                });
            });
        </script>

    </main>
</body>

</html>
