<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Harian</title>
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
    @include ('layout.navbar')
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
                    <h3>Input Data Muatan</h3>
                    <div class="card mt-3">
                        <div class="card-header">
                            Tambah Data Muatan
                        </div>
                        <div class="card-body">
                            <form action="{{ route('inputmuatan-add') }}" method="POST">
                                @csrf

                                <!-- Nama Kapal -->
                                <div class="mb-3">
                                    <label for="nama_kapal" class="form-label">Nama Kapal</label>
                                    <select class="form-select" id="nama_kapal" name="nama_kapal" required>
                                        <option value="">Kapal</option>
                                        <option value="Gilimanuk 1">Gilimanuk 1</option>
                                        <option value="Gilimanuk 2">Gilimanuk 2</option>
                                    </select>
                                </div>

                                <!-- Trip -->
                                <div class="mb-3">
                                    <label for="trip" class="form-label">Trip</label>
                                    <select class="form-select" id="trip" name="trip" required>
                                        <option value="">Pilih Trip</option>
                                        @for ($i = 1; $i <= 8; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>

                                <!-- Tanggal -->
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal Keberangkatan</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                                </div>

                                <!-- Penumpang -->
                                <div class="mb-3">
                                    <label class="form-label">Jumlah Penumpang</label>
                                    <div class="row">
                                        @foreach (['penumpang_dewasa' => 'Dewasa', 'penumpang_lansia' => 'Lansia', 'penumpang_anak' => 'Anak', 'penumpang_bayi' => 'Bayi'] as $key => $label)
                                            <div class="col-md-3">
                                                <label for="{{ $key }}" class="form-label">{{ $label }}</label>
                                                <input type="number" class="form-control" id="{{ $key }}" name="{{ $key }}"
                                                    value="0" min="0" required>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Golongan Kendaraan -->
                                <div class="mb-3">
                                    <label class="form-label">Jumlah Kendaraan</label>
                                    <div class="row">
                                        @foreach (['golongan_1' => 'Golongan 1', 'golongan_2' => 'Golongan 2', 'golongan_3' => 'Golongan 3', 'golongan_4_penumpang' => 'Golongan 4 (Penumpang)', 'golongan_4_barang' => 'Golongan 4 (Barang)', 'golongan_5_penumpang' => 'Golongan 5 (Penumpang)', 'golongan_5_barang' => 'Golongan 5 (Barang)', 'golongan_6_penumpang' => 'Golongan 6 (Penumpang)', 'golongan_6_barang' => 'Golongan 6 (Barang)', 'golongan_7' => 'Golongan 7', 'golongan_8' => 'Golongan 8', 'golongan_9' => 'Golongan 9'] as $key => $label)
                                            <div class="col-md-4">
                                                <label for="{{ $key }}" class="form-label">{{ $label }}</label>
                                                <input type="number" class="form-control" id="{{ $key }}" name="{{ $key }}"
                                                    value="0" min="0" required>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Submit -->
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