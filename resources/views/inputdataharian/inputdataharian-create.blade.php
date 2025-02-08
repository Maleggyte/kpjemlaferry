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
                    <h3>Input Data Harian</h3>
                    <div class="card mt-3">
                        <div class="card-header">
                            Tambah Data Harian
                        </div>
                        <div class="card-body">
                            <form action="{{ route('input-add') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="pelabuhan" class="form-label">Pelabuhan</label>
                                    <select class="form-select" id="pelabuhan" name="pelabuhan" required>
                                        <option value="">Pilih Pelabuhan</option>
                                        <option value="Ketapang">Ketapang</option>
                                        <option value="Gilimanuk">Gilimanuk</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="kapal" class="form-label">Kapal</label>
                                    <select class="form-select" id="kapal" name="kapal" required>
                                        <option value="">Pilih Kapal</option>
                                        <option value="Gilimanuk 1">Gilimanuk 1</option>
                                        <option value="Gilimanuk 2">Gilimanuk 2</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_keberangkatan" class="form-label">Tanggal Keberangkatan</label>
                                    <input type="date" class="form-control" id="tanggal_keberangkatan"
                                        name="tanggal_keberangkatan" required>
                                </div>
                                <div class="mb-3">
                                    <label for="jam_keberangkatan" class="form-label">Jam Keberangkatan</label>
                                    <input type="time" class="form-control" id="jam_keberangkatan"
                                        name="jam_keberangkatan" required>
                                </div>
                                <div class="mb-3">
                                    <label for="trip" class="form-label">Trip</label>
                                    <select class="form-select" id="trip" name="trip" required>
                                        <option value="">Pilih Trip</option>
                                        <option value="Reguler">Reguler</option>
                                        <option value="Sisip">Sisip</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="jumlah_trip" class="form-label">Jumlah Trip</label>
                                    <select class="form-select" id="jumlah_trip" name=" jumlah_trip" required>
                                        <option value="">Jumlah Trip</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="dermaga" class="form-label">Dermaga</label>
                                    <select class="form-select" id="dermaga" name="dermaga" required>
                                        <option value="">Pilih Dermaga</option>
                                        <option value="Dermaga 1">Dermaga 1</option>
                                        <option value="Dermaga 2">Dermaga 2</option>

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <textarea class="form-control" id="keterangan" name="keterangan"
                                        rows="3"></textarea>
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