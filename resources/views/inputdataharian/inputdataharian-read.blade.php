<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>input read</title>
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
    @include ('layout.sidebar', ['auth' => $auth])

    <div class="content" id="content">
        <div class="bg-light"
            style="background-image: url('{{ asset('images/gilimanuk2.jpg') }}'); background-size: cover; background-position: center; padding: 50px 0;">
            <div class="container-fluid bg-white p-4 rounded shadow">
                <h2 class="text-center mb-4">Input Data Harian</h2>
                <div class="card">
                    <div class="card-header">
                        <div class="row justify-content-between">
                            <div class="col-4 d-flex justify-content-start">
                                <a href="{{ route('input-create') }}" class="btn btn-primary">Tambah Data</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pelabuhan</th>
                                    <th>Kapal</th>
                                    <th>Tanggal Keberangkatan</th>
                                    <th>Jam Keberangkatan</th>
                                    <th>Trip</th>
                                    <th>Jumlah Trip</th>
                                    <th>Dermaga</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($input as $input)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $input->pelabuhan }}</td>
                                        <td>{{ $input->kapal }}</td>
                                        <td>{{ $input->tanggal_keberangkatan }}</td>
                                        <td>{{ $input->jam_keberangkatan }}</td>
                                        <td>{{ $input->trip }}</td>
                                        <td>{{ $input->jumlah_trip }}</td>
                                        <td>{{ $input->dermaga }}</td>
                                        <td>{{ $input->keterangan }}</td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="{{ route('input-edit', $input->id) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="fa-solid fa-pen"></i>
                                                </a>
                                                <button class="btn btn-danger btn-sm"
                                                    onclick="confirmDelete({{ $input->id }})">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </div>
                                            <form id="delete-form-{{ $input->id }}"
                                                action="{{ route('input-delete', $input->id) }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>




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

    <!-- Canvas dengan ukuran lebih kecil -->
    <div style="width: 1000px; height: 650px; margin: auto;">
        <canvas id="multiLineChart"></canvas>
    </div>

    <script>
        $(document).ready(function () {
            // Hapus DataTable jika sudah ada
            if ($.fn.DataTable.isDataTable("#example1")) {
                $("#example1").DataTable().destroy();
            }

            // Inisialisasi DataTable baru
            let table = $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "dom": 'Bfrtip',
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            });

            table.buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            // Tunggu DataTables selesai di-load, lalu buat grafik
            setTimeout(generateChart, 500);
        });


        function generateChart() {
            let labels = [];
            let jumlahTripData = [];
            let kapalData = [];
            let dermagaData = [];

            // Ambil data dari tabel #example1
            document.querySelectorAll("#example1 tbody tr").forEach(row => {
                let tanggal = row.cells[3]?.textContent.trim() || "Unknown";  // Kolom Tanggal Keberangkatan
                let jumlahTrip = parseInt(row.cells[6]?.textContent.trim()) || 0;  // Kolom Jumlah Trip
                let kapal = row.cells[2]?.textContent.trim() ? 1 : 0;  // Kolom Kapal
                let dermaga = row.cells[7]?.textContent.trim() ? 1 : 0;  // Kolom Dermaga

                labels.push(tanggal);
                jumlahTripData.push(jumlahTrip);
                kapalData.push(kapal);
                dermagaData.push(dermaga);
            });

            console.log("Labels: ", labels);
            console.log("Jumlah Trip Data: ", jumlahTripData);

            let ctx = document.getElementById("multiLineChart").getContext("2d");

            new Chart(ctx, {
                type: "line",
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: "Jumlah Trip",
                            data: jumlahTripData,
                            borderColor: "#007bff",
                            backgroundColor: "rgba(0, 123, 255, 0.2)",
                            borderWidth: 1.5,
                            fill: true
                        },
                        {
                            label: "Jumlah Kapal Beroperasi",
                            data: kapalData,
                            borderColor: "#28a745",
                            backgroundColor: "rgba(40, 167, 69, 0.2)",
                            borderWidth: 1.5,
                            fill: true
                        },
                        {
                            label: "Jumlah Dermaga Aktif",
                            data: dermagaData,
                            borderColor: "#dc3545",
                            backgroundColor: "rgba(220, 53, 69, 0.2)",
                            borderWidth: 1.5,
                            fill: true
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true, // Kunci aspect ratio supaya tidak membesar
                    aspectRatio: 2, // Mengontrol perbandingan ukuran grafik
                    layout: {
                        padding: 5 // Kurangi padding agar lebih kecil
                    },
                    plugins: {
                        legend: {
                            labels: {
                                font: {
                                    size: 10 // Mengecilkan ukuran teks di legenda
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            ticks: {
                                font: {
                                    size: 10 // Ukuran font sumbu X lebih kecil
                                }
                            }
                        },
                        y: {
                            beginAtZero: true,
                            ticks: {
                                font: {
                                    size: 10 // Ukuran font sumbu Y lebih kecil
                                }
                            }
                        }
                    }
                }
            });
        }
    </script>




    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "dom": 'Bfrtip',  // Tambahkan ini
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            setTimeout(generateChart, 500);
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