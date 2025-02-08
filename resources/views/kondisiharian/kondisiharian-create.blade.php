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
                        <a class="nav-link" href="/inputdataharian-read">Input Data Harian</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/inputdatamuatan-read">Input Data Muatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/jadwal-read">Jadwal</a>
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
                            <form action="{{ route('kondisi-add') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="pilih_pelabuhan" class="form-label">Pilih Pelabuhan</label>
                                    <select class="form-select" id="pilih_pelabuhan" name="pilih_pelabuhan" required>
                                        <option value="">Pilih Pelabuhan</option>
                                        <option value="Ketapang">Ketapang</option>
                                        <option value="Gilimanuk">Gilimanuk</option>
                                    </select>
                                    @error('pilih_pelabuhan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                                </div>

                                <!-- Jumlah Kapal Operasi -->
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col">
                                            <label for="kapal_operasi" class="form-label">Jumlah Kapal Operasi</label>
                                            <select class="form-select" id="kapal_operasi" name="kapal_operasi"
                                                required>
                                                <option value="">- Pilih Jumlah -</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pola Operasi -->
                                <div class="mb-3">
                                    <label for="pola_operasi" class="form-label">Pola Operasi</label>
                                    <textarea class="form-control" id="pola_operasi" name="pola_operasi" rows="3"
                                        placeholder="Pola Operasi Kapal Masing-Masing Pelabuhan.." required></textarea>
                                </div>

                                <!-- Kendala -->
                                <div class="mb-3">
                                    <label for="kendala" class="form-label">Kendala</label>
                                    <textarea class="form-control" id="kendala" name="kendala" rows="3"
                                        placeholder="Kendala Kapal Masing-Masing Pelabuhan.." required></textarea>
                                </div>

                                <!-- Cuaca -->
                                <div class="mb-3">
                                    <label class="form-label">Cuaca</label>
                                    <div class="row">
                                        <div class="col">
                                            <select class="form-select" name="cuaca_pagi">
                                                <option value="">Pagi</option>
                                                <option value="cerah">Cerah</option>
                                                <option value="hujan">Hujan</option>
                                                <option value="berkabut">Berkabut</option>
                                                <option value="extreme">Extreme</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-select" name="cuaca_siang">
                                                <option value="">Siang</option>
                                                <option value="cerah">Cerah</option>
                                                <option value="hujan">Hujan</option>
                                                <option value="berkabut">Berkabut</option>
                                                <option value="extreme">Extreme</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-select" name="cuaca_sore">
                                                <option value="">Sore</option>
                                                <option value="cerah">Cerah</option>
                                                <option value="hujan">Hujan</option>
                                                <option value="berkabut">Berkabut</option>
                                                <option value="extreme">Extreme</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-select" name="cuaca_malam">
                                                <option value="">Malam</option>
                                                <option value="cerah">Cerah</option>
                                                <option value="hujan">Hujan</option>
                                                <option value="berkabut">Berkabut</option>
                                                <option value="extreme">Extreme</option>
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
                                                <option value="tenang">Tenang</option>
                                                <option value="lemah">Lemah</option>
                                                <option value="sedang">Sedang</option>
                                                <option value="kencang">Kencang</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-select" name="angin_siang">
                                                <option value="">Siang</option>
                                                <option value="tenang">Tenang</option>
                                                <option value="lemah">Lemah</option>
                                                <option value="sedang">Sedang</option>
                                                <option value="kencang">Kencang</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-select" name="angin_sore">
                                                <option value="">Sore</option>
                                                <option value="tenang">Tenang</option>
                                                <option value="lemah">Lemah</option>
                                                <option value="sedang">Sedang</option>
                                                <option value="kencang">Kencang</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-select" name="angin_malam">
                                                <option value="">Malam</option>
                                                <option value="tenang">Tenang</option>
                                                <option value="lemah">Lemah</option>
                                                <option value="sedang">Sedang</option>
                                                <option value="kencang">Kencang</option>
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
                                                <option value="tenang">Tenang</option>
                                                <option value="rendah">Rendah</option>
                                                <option value="sedang">Sedang</option>
                                                <option value="tinggi">Tinggi</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-select" name="gelombang_siang">
                                                <option value="">Siang</option>
                                                <option value="tenang">Tenang</option>
                                                <option value="rendah">Rendah</option>
                                                <option value="sedang">Sedang</option>
                                                <option value="tinggi">Tinggi</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-select" name="gelombang_sore">
                                                <option value="">Sore</option>
                                                <option value="tenang">Tenang</option>
                                                <option value="rendah">Rendah</option>
                                                <option value="sedang">Sedang</option>
                                                <option value="tinggi">Tinggi</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-select" name="gelombang_malam">
                                                <option value="">Malam</option>
                                                <option value="tenang">Tenang</option>
                                                <option value="rendah">Rendah</option>
                                                <option value="sedang">Sedang</option>
                                                <option value="tinggi">Tinggi</option>
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
                                                <option value="sepi">Sepi</option>
                                                <option value="sedang">Sedang</option>
                                                <option value="ramai">Ramai</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-select" name="lintasan_siang">
                                                <option value="">Siang</option>
                                                <option value="sepi">Sepi</option>
                                                <option value="sedang">Sedang</option>
                                                <option value="ramai">Ramai</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-select" name="lintasan_sore">
                                                <option value="">Sore</option>
                                                <option value="sepi">Sepi</option>
                                                <option value="sedang">Sedang</option>
                                                <option value="ramai">Ramai</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-select" name="lintasan_malam">
                                                <option value="">Malam</option>
                                                <option value="sepi">Sepi</option>
                                                <option value="sedang">Sedang</option>
                                                <option value="ramai">Ramai</option>
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