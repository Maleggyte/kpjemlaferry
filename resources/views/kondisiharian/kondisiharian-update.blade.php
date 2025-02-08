<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kondisi Harian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .sidebar {
            height: 100vh;
            padding: 20px;
            background-color: #f8f9fa;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: #000;
        }

        .sidebar ul li a:hover {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>

<body>
    @include ('layout.navbar2')
    <div class="container-fluid"
        style="background-image: url('{{ asset('images/gilimanuk2.jpg') }}'); background-size: cover; background-position: center; padding: 50px 0;">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar">
                <h5 class="text-center py-3">DEP. OPERASIONAL</h5>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="/kondisiharian">Kondisi Harian</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/laporan">Laporan Operasional</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/jadwal-read">Jadwal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/inputdataharian">Input Data Harian</a>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="col-md-10">
                <div class="container mt-3">
                    <h3>Kondisi Harian</h3>
                    <div class="card mt-3">
                        <div class="card-header">
                            Tambah Kondisi Harian
                        </div>
                        <div class="card-body">
                            <form action="{{ route('kondisi-update', $kondisi->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="pilih_pelabuhan" class="form-label">Pilih Pelabuhan</label>
                                    <select class="form-select" id="pilih_pelabuhan_{{ $kondisi->id }}"
                                        name="pilih_pelabuhan" required>
                                        <option value="">Pilih Pelabuhan</option>
                                        <option value="Ketapang" {{ old('pilih_pelabuhan', $kondisi->pilih_pelabuhan) == 'Ketapang' ? 'selected' : '' }}>Ketapang
                                        </option>
                                        <option value="Gilimanuk" {{ old('pilih_pelabuhan', $kondisi->pilih_pelabuhan) == 'Gilimanuk' ? 'selected' : '' }}>Gilimanuk
                                        </option>
                                    </select>
                                    @error('pilih_pelabuhan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control"
                                        value="{{ old('tanggal', $kondisi->tanggal) }}" id="tanggal" name="tanggal"
                                        required>
                                </div>

                                <!-- Jumlah Kapal Operasi -->
                                <div class="mb-3">
                                    <label for="jumlah_kapal" class="form-label">Jumlah Kapal Operasi</label>
                                    <div class="row">
                                        <div class="col">
                                            <label for="kapal_gilimanuk1" class="form-label">Kapal Gilimanuk 1</label>
                                            <select class="form-select" id="kapal_gilimanuk1" name="kapal_gilimanuk1"
                                                required>
                                                <option value="">- Pilih Jumlah -</option>
                                                <option value="1" {{ old('kapal_gilimanuk1', $kondisi->kapal_gilimanuk1) == '1' ? 'selected' : '' }}>1</option>
                                                <option value="2" {{ old('kapal_gilimanuk1', $kondisi->kapal_gilimanuk1) == '2' ? 'selected' : '' }}>2</option>
                                                <option value="3" {{ old('kapal_gilimanuk1', $kondisi->kapal_gilimanuk1) == '3' ? 'selected' : '' }}>3</option>
                                                <option value="4" {{ old('kapal_gilimanuk1', $kondisi->kapal_gilimanuk1) == '4' ? 'selected' : '' }}>4</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="kapal_gilimanuk2" class="form-label">Kapal Gilimanuk 2</label>
                                            <select class="form-select" id="kapal_gilimanuk2" name="kapal_gilimanuk2"
                                                required>
                                                <option value="">- Pilih Jumlah -</option>
                                                <option value="1" {{ old('kapal_gilimanuk2', $kondisi->kapal_gilimanuk2) == '1' ? 'selected' : '' }}>1</option>
                                                <option value="2" {{ old('kapal_gilimanuk2', $kondisi->kapal_gilimanuk2) == '2' ? 'selected' : '' }}>2</option>
                                                <option value="3" {{ old('kapal_gilimanuk2', $kondisi->kapal_gilimanuk2) == '3' ? 'selected' : '' }}>3</option>
                                                <option value="4" {{ old('kapal_gilimanuk2', $kondisi->kapal_gilimanuk2) == '4' ? 'selected' : '' }}>4</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pola Operasi -->
                                <div class="mb-3">
                                    <label for="pola_operasi" class="form-label">Pola Operasi</label>
                                    <textarea class="form-control"
                                        value="{{ old('pola_operasi', $kondisi->pola_operasi) }}" id="pola_operasi"
                                        name="pola_operasi" rows="3"
                                        placeholder="Pola Operasi Kapal Masing-Masing Pelabuhan.." required></textarea>
                                </div>

                                <!-- Cuaca -->
                                <div class="mb-3">
                                    <label class="form-label">Cuaca</label>
                                    <div class="row">
                                        <div class="col">
                                            <select class="form-select" name="cuaca_pagi">
                                                <option value="">Pagi</option>
                                                <option value="Cerah" {{ old('cuaca_pagi', $kondisi->cuaca_pagi) == 'Cerah' ? 'selected' : '' }}>Cerah</option>
                                                <option value="Hujan" {{ old('cuaca_pagi', $kondisi->cuaca_pagi) == 'Hujan' ? 'selected' : '' }}>Hujan</option>
                                                <option value="Berkabut" {{ old('cuaca_pagi', $kondisi->cuaca_pagi) == 'Berkabut' ? 'selected' : '' }}>Berkabut
                                                </option>
                                                <option value="Extreme" {{ old('cuaca_pagi', $kondisi->cuaca_pagi) == 'Extreme' ? 'selected' : '' }}>Extreme
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-select" name="cuaca_siang">
                                                <option value="">Siang</option>
                                                <option value="Cerah" {{ old('cuaca_siang', $kondisi->cuaca_siang) == 'Cerah' ? 'selected' : '' }}>Cerah</option>
                                                <option value="Hujan" {{ old('cuaca_siang', $kondisi->cuaca_siang) == 'Hujan' ? 'selected' : '' }}>Hujan</option>
                                                <option value="Berkabut" {{ old('cuaca_siang', $kondisi->cuaca_siang) == 'Berkabut' ? 'selected' : '' }}>Berkabut
                                                </option>
                                                <option value="Extreme" {{ old('cuaca_siang', $kondisi->cuaca_siang) == 'Extreme' ? 'selected' : '' }}>Extreme
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-select" name="cuaca_sore">
                                                <option value="">Sore</option>
                                                <option value="Cerah" {{ old('cuaca_sore', $kondisi->cuaca_sore) == 'Cerah' ? 'selected' : '' }}>Cerah</option>
                                                <option value="Hujan" {{ old('cuaca_sore', $kondisi->cuaca_sore) == 'Hujan' ? 'selected' : '' }}>Hujan</option>
                                                <option value="Berkabut" {{ old('cuaca_sore', $kondisi->cuaca_sore) == 'Berkabut' ? 'selected' : '' }}>Berkabut
                                                </option>
                                                <option value="Extreme" {{ old('cuaca_sore', $kondisi->cuaca_sore) == 'Extreme' ? 'selected' : '' }}>Extreme
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-select" name="cuaca_malam">
                                                <option value="">Malam</option>
                                                <option value="Cerah" {{ old('cuaca_malam', $kondisi->cuaca_malam) == 'Cerah' ? 'selected' : '' }}>Cerah</option>
                                                <option value="Hujan" {{ old('cuaca_malam', $kondisi->cuaca_malam) == 'Hujan' ? 'selected' : '' }}>Hujan</option>
                                                <option value="Berkabut" {{ old('cuaca_malam', $kondisi->cuaca_malam) == 'Berkabut' ? 'selected' : '' }}>Berkabut
                                                </option>
                                                <option value="Extreme" {{ old('cuaca_malam', $kondisi->cuaca_malam) == 'Extreme' ? 'selected' : '' }}>Extreme
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Angin -->
                                <div class="mb-3">
                                    <label class="form-label">Angin</label>
                                    <div class="row">
                                        <div class="col">
                                            <select class="form-select" name="angin_pagi">
                                                <option value="">Pagi</option>
                                                <option value="Tenang" {{ old('angin_pagi', $kondisi->angin_pagi) == 'Tenang' ? 'selected' : '' }}>Tenang</option>
                                                <option value="Lemah" {{ old('angin_pagi', $kondisi->angin_pagi) == 'Lemah' ? 'selected' : '' }}>Lemah</option>
                                                <option value="Sedang" {{ old('angin_pagi', $kondisi->angin_pagi) == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                                                <option value="Kencang" {{ old('angin_pagi', $kondisi->angin_pagi) == 'Kencang' ? 'selected' : '' }}>Kencang
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-select" name="angin_siang">
                                                <option value="">Siang</option>
                                                <option value="Tenang" {{ old('angin_siang', $kondisi->angin_pagi) == 'Tenang' ? 'selected' : '' }}>Tenang</option>
                                                <option value="Lemah" {{ old('angin_siang', $kondisi->angin_pagi) == 'Lemah' ? 'selected' : '' }}>Lemah</option>
                                                <option value="Sedang" {{ old('angin_siang', $kondisi->angin_pagi) == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                                                <option value="Kencang" {{ old('angin_siang', $kondisi->angin_pagi) == 'Kencang' ? 'selected' : '' }}>Kencang
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-select" name="angin_sore">
                                                <option value="">Sore</option>
                                                <option value="Tenang" {{ old('angin_sore', $kondisi->angin_sore) == 'Tenang' ? 'selected' : '' }}>Tenang</option>
                                                <option value="Lemah" {{ old('angin_sore', $kondisi->angin_sore) == 'Lemah' ? 'selected' : '' }}>Lemah</option>
                                                <option value="Sedang" {{ old('angin_sore', $kondisi->angin_sore) == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                                                <option value="Kencang" {{ old('angin_sore', $kondisi->angin_sore) == 'Kencang' ? 'selected' : '' }}>Kencang
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-select" name="angin_malam">
                                                <option value="">Malam</option>
                                                <option value="Tenang" {{ old('angin_malam', $kondisi->angin_malam) == 'Tenang' ? 'selected' : '' }}>Tenang
                                                </option>
                                                <option value="Lemah" {{ old('angin_malam', $kondisi->angin_malam) == 'Lemah' ? 'selected' : '' }}>Lemah</option>
                                                <option value="Sedang" {{ old('angin_malam', $kondisi->angin_malam) == 'Sedang' ? 'selected' : '' }}>Sedang
                                                </option>
                                                <option value="Kencang" {{ old('angin_malam', $kondisi->angin_malam) == 'Kencang' ? 'selected' : '' }}>Kencang
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Gelombang -->
                                <div class="mb-3">
                                    <label class="form-label">Gelombang</label>
                                    <div class="row">
                                        <div class="col">
                                            <select class="form-select" name="gelombang_pagi">
                                                <option value="">Pagi</option>
                                                <option value="Tenang" {{ old('gelombang_pagi', $kondisi->gelombang_pagi) == 'Tenang' ? 'selected' : '' }}>Tenang
                                                </option>
                                                <option value="Rendah" {{ old('gelombang_pagi', $kondisi->gelombang_pagi) == 'Rendah' ? 'selected' : '' }}>Rendah
                                                </option>
                                                <option value="Sedang" {{ old('gelombang_pagi', $kondisi->gelombang_pagi) == 'Sedang' ? 'selected' : '' }}>Sedang
                                                </option>
                                                <option value="Tinggi" {{ old('gelombang_pagi', $kondisi->gelombang_pagi) == 'Tinggi' ? 'selected' : '' }}>Tinggi
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-select" name="gelombang_siang">
                                                <option value="">Siang</option>
                                                <option value="Tenang" {{ old('gelombang_siang', $kondisi->gelombang_siang) == 'Tenang' ? 'selected' : '' }}>Tenang
                                                </option>
                                                <option value="Rendah" {{ old('gelombang_siang', $kondisi->gelombang_siang) == 'Rendah' ? 'selected' : '' }}>Rendah
                                                </option>
                                                <option value="Sedang" {{ old('gelombang_siang', $kondisi->gelombang_siang) == 'Sedang' ? 'selected' : '' }}>Sedang
                                                </option>
                                                <option value="Tinggi" {{ old('gelombang_siang', $kondisi->gelombang_siang) == 'Tinggi' ? 'selected' : '' }}>Tinggi
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-select" name="gelombang_sore">
                                                <option value="">Sore</option>
                                                <option value="Tenang" {{ old('gelombang_sore', $kondisi->gelombang_sore) == 'Tenang' ? 'selected' : '' }}>Tenang
                                                </option>
                                                <option value="Rendah" {{ old('gelombang_sore', $kondisi->gelombang_sore) == 'Rendah' ? 'selected' : '' }}>Rendah
                                                </option>
                                                <option value="Sedang" {{ old('gelombang_sore', $kondisi->gelombang_sore) == 'Sedang' ? 'selected' : '' }}>Sedang
                                                </option>
                                                <option value="Tinggi" {{ old('gelombang_sore', $kondisi->gelombang_sore) == 'Tinggi' ? 'selected' : '' }}>Tinggi
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-select" name="gelombang_malam">
                                                <option value="">Malam</option>
                                                <option value="Tenang" {{ old('gelombang_malam', $kondisi->gelombang_malam) == 'Tenang' ? 'selected' : '' }}>Tenang
                                                </option>
                                                <option value="Rendah" {{ old('gelombang_malam', $kondisi->gelombang_malam) == 'Rendah' ? 'selected' : '' }}>Rendah
                                                </option>
                                                <option value="Sedang" {{ old('gelombang_malam', $kondisi->gelombang_malam) == 'Sedang' ? 'selected' : '' }}>Sedang
                                                </option>
                                                <option value="Tinggi" {{ old('gelombang_malam', $kondisi->gelombang_malam) == 'Tinggi' ? 'selected' : '' }}>Tinggi
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Kondisi Lintasan -->
                                <div class="mb-3">
                                    <label class="form-label">Kondisi Lintasan</label>
                                    <div class="row">
                                        <div class="col">
                                            <select class="form-select" name="lintasan_pagi">
                                                <option value="">Pagi</option>
                                                <option value="Aman" {{ old('lintasan_pagi', $kondisi->lintasan_pagi) == 'Aman' ? 'selected' : '' }}>Aman</option>
                                                <option value="Berbahaya" {{ old('lintasan_pagi', $kondisi->lintasan_pagi) == 'Berbahaya' ? 'selected' : '' }}>Berbahaya
                                                </option>
                                                <option value="Tertunda" {{ old('lintasan_pagi', $kondisi->lintasan_pagi) == 'Tertunda' ? 'selected' : '' }}>Tertunda
                                                </option>
                                                <option value="Ditutup" {{ old('lintasan_pagi', $kondisi->lintasan_pagi) == 'Ditutup' ? 'selected' : '' }}>Ditutup
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-select" name="lintasan_siang">
                                                <option value="">Siang</option>
                                                <option value="Aman" {{ old('lintasan_siang', $kondisi->lintasan_siang) == 'Aman' ? 'selected' : '' }}>Aman</option>
                                                <option value="Berbahaya" {{ old('lintasan_siang', $kondisi->lintasan_siang) == 'Berbahaya' ? 'selected' : '' }}>
                                                    Berbahaya</option>
                                                <option value="Tertunda" {{ old('lintasan_siang', $kondisi->lintasan_siang) == 'Tertunda' ? 'selected' : '' }}>Tertunda
                                                </option>
                                                <option value="Ditutup" {{ old('lintasan_siang', $kondisi->lintasan_siang) == 'Ditutup' ? 'selected' : '' }}>Ditutup
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-select" name="lintasan_sore">
                                                <option value="">Sore</option>
                                                <option value="Aman" {{ old('lintasan_sore', $kondisi->lintasan_sore) == 'Aman' ? 'selected' : '' }}>Aman</option>
                                                <option value="Berbahaya" {{ old('lintasan_sore', $kondisi->lintasan_sore) == 'Berbahaya' ? 'selected' : '' }}>Berbahaya
                                                </option>
                                                <option value="Tertunda" {{ old('lintasan_sore', $kondisi->lintasan_sore) == 'Tertunda' ? 'selected' : '' }}>Tertunda
                                                </option>
                                                <option value="Ditutup" {{ old('lintasan_sore', $kondisi->lintasan_sore) == 'Ditutup' ? 'selected' : '' }}>Ditutup
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-select" name="lintasan_malam">
                                                <option value="">Malam</option>
                                                <option value="Aman" {{ old('lintasan_malam', $kondisi->lintasan_malam) == 'Aman' ? 'selected' : '' }}>Aman</option>
                                                <option value="Berbahaya" {{ old('lintasan_malam', $kondisi->lintasan_malam) == 'Berbahaya' ? 'selected' : '' }}>
                                                    Berbahaya</option>
                                                <option value="Tertunda" {{ old('lintasan_malam', $kondisi->lintasan_malam) == 'Tertunda' ? 'selected' : '' }}>Tertunda
                                                </option>
                                                <option value="Ditutup" {{ old('lintasan_malam', $kondisi->lintasan_malam) == 'Ditutup' ? 'selected' : '' }}>Ditutup
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="#" class="btn btn-danger">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: '{{ session('success') }}',
                    timer: 2000,
                    showConfirmButton: false
                });
            @endif
        });
        document.addEventListener('DOMContentLoaded', function () {
            @if ($errors->any())
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    html: `
                                                                                <ul>
                                                                                    @foreach ($errors->all() as $error)
                                                                                        <li>{{ $error }}</li>
                                                                                    @endforeach
                                                                                </ul>
                                                                            `,
                });
            @endif

            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: '{{ session('success') }}',
                });
            @endif
        });
        function confirmDelete(id) {
            Swal.fire({
                title: 'Anda yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
</body>

</html>