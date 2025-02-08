<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lihat data kondisi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/4c1da8a416.js" crossorigin="anonymous"></script>

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- Tambahkan ini di head bagian HTML Anda -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .sidebar {
            width: 250px;
            position: fixed;
            top: 0;
            left: -250px;
            height: 100%;
            background: #f8f9fa;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            transition: left 0.3s ease;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 15px 0;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }

        .sidebar .profile {
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar .profile img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .sidebar.active {
            left: 0;
        }

        .hamburger {
            font-size: 24px;
            cursor: pointer;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1000;
        }

        .content {
            margin-left: 0;
            padding: 20px;
            transition: margin-left 0.3s ease;
        }

        .content.active {
            margin-left: 250px;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    @include ('layout.navbar2')

    <!-- Sidebar -->
    @include ('layout.sidebar')

    <div class="content" id="content">
        <div class="bg-light"
            style="background-image: url('{{ asset('images/gilimanuk2.jpg') }}'); background-size: cover; background-position: center; padding: 50px 0;">
            <div class="container-fluid bg-white p-4 rounded shadow">
                <h2 class="text-center mb-4">Kondisi Harian</h2>
                <div class="card">
                    <div class="card-header">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">← Back</a>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Data</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Nama Kapal</td>
                                    <td>{{ $inputmuatan->nama_kapal }}</td>
                                </tr>
                                <tr>
                                    <td>Trip</td>
                                    <td>{{ $inputmuatan->trip }}</td>
                                </tr>

                                <!-- Penumpang -->
                                <tr>
                                    <td>Penumpang Dewasa</td>
                                    <td>{{ $inputmuatan->penumpang_dewasa }}</td>
                                </tr>
                                <tr>
                                    <td>Penumpang Lansia</td>
                                    <td>{{ $inputmuatan->penumpang_lansia }}</td>
                                </tr>
                                <tr>
                                    <td>Penumpang Anak</td>
                                    <td>{{ $inputmuatan->penumpang_anak }}</td>
                                </tr>
                                <tr>
                                    <td>Penumpang Bayi</td>
                                    <td>{{ $inputmuatan->penumpang_bayi }}</td>
                                </tr>

                                <!-- Golongan Kendaraan -->
                                <tr>
                                    <td>Golongan 1</td>
                                    <td>{{ $inputmuatan->golongan_1 }}</td>
                                </tr>
                                <tr>
                                    <td>Golongan 2</td>
                                    <td>{{ $inputmuatan->golongan_2 }}</td>
                                </tr>
                                <tr>
                                    <td>Golongan 3</td>
                                    <td>{{ $inputmuatan->golongan_3 }}</td>
                                </tr>
                                <tr>
                                    <td>Golongan 4 Penumpang</td>
                                    <td>{{ $inputmuatan->golongan_4_penumpang }}</td>
                                </tr>
                                <tr>
                                    <td>Golongan 4 Barang</td>
                                    <td>{{ $inputmuatan->golongan_4_barang }}</td>
                                </tr>
                                <tr>
                                    <td>Golongan 5 Penumpang</td>
                                    <td>{{ $inputmuatan->golongan_5_penumpang }}</td>
                                </tr>
                                <tr>
                                    <td>Golongan 5 Barang</td>
                                    <td>{{ $inputmuatan->golongan_5_barang }}</td>
                                </tr>
                                <tr>
                                    <td>Golongan 6 Penumpang</td>
                                    <td>{{ $inputmuatan->golongan_6_penumpang }}</td>
                                </tr>
                                <tr>
                                    <td>Golongan 6 Barang</td>
                                    <td>{{ $inputmuatan->golongan_6_barang }}</td>
                                </tr>
                                <tr>
                                    <td>Golongan 7</td>
                                    <td>{{ $inputmuatan->golongan_7 }}</td>
                                </tr>
                                <tr>
                                    <td>Golongan 8</td>
                                    <td>{{ $inputmuatan->golongan_8 }}</td>
                                </tr>
                                <tr>
                                    <td>Golongan 9</td>
                                    <td>{{ $inputmuatan->golongan_9 }}</td>
                                </tr>

                                <!-- Total -->
                                <tr>
                                    <td>Total Jumlah</td>
                                    <td>{{ $inputmuatan->jumlah }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#example1').DataTable({
                "paging": true,         // Aktifkan pagination
                "searching": true,      // Aktifkan pencarian
                "ordering": false,      // Nonaktifkan fitur sorting
                "info": false,          // Nonaktifkan informasi jumlah data
                "lengthChange": false   // Nonaktifkan opsi jumlah data per halaman
            });
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- ChartJS -->
    {{--
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "dom": 'Bfrtip',  // Tambahkan ini
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

    <script>
        const hamburger = document.getElementById('hamburger');
        const sidebar = document.getElementById('sidebar');
        const content = document.getElementById('content');
        const btnKetapang = document.getElementById('btnKetapang');
        const btnGilimanuk = document.getElementById('btnGilimanuk');
        const jadwalTable = document.getElementById('jadwalTable');

        hamburger.addEventListener('click', () => {
            sidebar.classList.toggle('active');
            content.classList.toggle('active');
        });
    </script>
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