<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akun Saya</title>
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

    <!-- Content -->
    <div class="content" id="content">
        <div class="bg-light"
            style="background-image: url('{{ asset('images/gilimanuk2.jpg') }}'); background-size: cover; background-position: center; padding: 50px 0;">
            <div class="container bg-white p-4 rounded shadow">
                <h2 class="text-center mb-4">Akun Saya</h2>
                <div class="card">
                    <div class="card-header">
                        <div class="row justify-content-between">
                            <div class="col-4 d-flex justify-content-start">
                                <a href="/akunsaya-create" class="btn btn-primary">Tambah Data</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $user)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $user->nama }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->password }}</td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="{{ route('akunsaya-edit', $user->id) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="fa-solid fa-pen"></i>
                                                </a>
                                                <button class="btn btn-danger btn-sm"
                                                    onclick="confirmDelete({{ $user->id }})">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </div>
                                            <form id="delete-form-{{ $user->id }}"
                                                action="{{ route('akunsaya-delete', $user->id) }}" method="POST"
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
            <!-- /.card-body -->
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Page specific script -->
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
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
        document.addEventListener("DOMContentLoaded", function () {
            // Ambil data jadwal keberangkatan dari tabel
            const rows = document.querySelectorAll("#example1 tbody tr");

            // Inisialisasi semua bulan dari Januari - Desember
            const dataPerBulan = {
                "Januari": 0, "Februari": 0, "Maret": 0, "April": 0,
                "Mei": 0, "Juni": 0, "Juli": 0, "Agustus": 0,
                "September": 0, "Oktober": 0, "November": 0, "Desember": 0
            };

            rows.forEach(row => {
                const tanggal = row.children[3].textContent.trim(); // Ambil tanggal keberangkatan
                const bulan = new Date(tanggal).toLocaleString('id-ID', { month: 'long' });

                if (dataPerBulan.hasOwnProperty(bulan)) {
                    dataPerBulan[bulan] += 1;
                }
            });

            // Konversi data untuk chart
            const labels = Object.keys(dataPerBulan);
            const dataValues = Object.values(dataPerBulan); // Pastikan bilangan bulat

            // Buat canvas untuk chart
            const chartContainer = document.createElement('div');
            chartContainer.classList.add('mt-4');
            chartContainer.innerHTML = '<canvas id="jadwalChart"></canvas>';
            document.querySelector(".container").appendChild(chartContainer);

            // Inisialisasi Chart.js dengan Line Chart
            const ctx = document.getElementById("jadwalChart").getContext("2d");
            new Chart(ctx, {
                type: "line",
                data: {
                    labels: labels,
                    datasets: [{
                        label: "Jumlah Keberangkatan",
                        backgroundColor: "rgba(54, 162, 235, 0.2)",
                        borderColor: "rgba(54, 162, 235, 1)",
                        borderWidth: 2,
                        pointRadius: 5,
                        pointBackgroundColor: "rgba(54, 162, 235, 1)",
                        data: dataValues,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: "Jumlah Keberangkatan"
                            },
                            ticks: {
                                stepSize: 1 // Pastikan hanya bilangan bulat
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: "Bulan"
                            }
                        }
                    }
                }
            });
        });
    </script>

    <script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
        // Ambil data jadwal keberangkatan dari tabel
        const rows = document.querySelectorAll("#example1 tbody tr");

            // Inisialisasi semua bulan dari Januari - Desember
            const dataPerBulan = {
                "Januari": 0, "Februari": 0, "Maret": 0, "April": 0,
            "Mei": 0, "Juni": 0, "Juli": 0, "Agustus": 0,
            "September": 0, "Oktober": 0, "November": 0, "Desember": 0
        };

        rows.forEach(row => {
            const tanggal = row.children[3].textContent.trim(); // Ambil tanggal keberangkatan
            const bulan = new Date(tanggal).toLocaleString('id-ID', {month: 'long' });

            if (dataPerBulan.hasOwnProperty(bulan)) {
                dataPerBulan[bulan] += 1;
            }
        });

            // Konversi data untuk chart
            const labels = Object.keys(dataPerBulan);
            const dataValues = Object.values(dataPerBulan); // Pastikan bilangan bulat

            // Buat canvas untuk chart
            const chartContainer = document.createElement('div');
            chartContainer.classList.add('mt-4');
            chartContainer.innerHTML = '<canvas id="jadwalChart"></canvas>';
            document.querySelector(".container").appendChild(chartContainer);

            // Inisialisasi Chart.js dengan Line Chart
            const ctx = document.getElementById("jadwalChart").getContext("2d");
            new Chart(ctx, {
                type: "line",
            data: {
                labels: labels,
            datasets: [{
                label: "Jumlah Keberangkatan",
            backgroundColor: "rgba(54, 162, 235, 0.2)",
            borderColor: "rgba(54, 162, 235, 1)",
            borderWidth: 2,
            pointRadius: 5,
            pointBackgroundColor: "rgba(54, 162, 235, 1)",
            data: dataValues,
            fill: true
                }]
            },
            options: {
                responsive: true,
            scales: {
                y: {
                beginAtZero: true,
            title: {
                display: true,
            text: "Jumlah Keberangkatan"
                        },
            ticks: {
                stepSize: 1 // Pastikan hanya bilangan bulat
                        }
                    },
            x: {
                title: {
                display: true,
            text: "Bulan"
                        }
                    }
                }
            }
        });
    });
    </script>

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

            document.addEventListener("DOMContentLoaded", function () {
                const btnKetapang = document.getElementById("btnKetapang");
            const btnGilimanuk = document.getElementById("btnGilimanuk");
            const btnAll = document.createElement("button");
            btnAll.textContent = "All";
            btnAll.classList.add("btn", "btn-secondary", "me-2");
            btnAll.id = "btnAll";
            btnKetapang.parentNode.insertBefore(btnAll, btnKetapang);

            const rows = document.querySelectorAll("#example1 tbody tr");

            btnKetapang.addEventListener("click", function () {
                filterJadwal("Ketapang");
            setActiveButton(btnKetapang);
                });

            btnGilimanuk.addEventListener("click", function () {
                filterJadwal("Gilimanuk");
            setActiveButton(btnGilimanuk);
                });

            btnAll.addEventListener("click", function () {
                filterJadwal("All");
            setActiveButton(btnAll);
                });

            function filterJadwal(pelabuhan) {
                rows.forEach(row => {
                    const pelabuhanRow = row.children[1].textContent.trim(); // Ambil teks dari kolom Pelabuhan
                    if (pelabuhan === "All" || pelabuhanRow === pelabuhan) {
                        row.style.display = "";
                    } else {
                        row.style.display = "none";
                    }
                });
                }

            function setActiveButton(activeButton) {
                btnKetapang.classList.remove("btn-primary");
            btnKetapang.classList.add("btn-secondary");
            btnGilimanuk.classList.remove("btn-primary");
            btnGilimanuk.classList.add("btn-secondary");
            btnAll.classList.remove("btn-primary");
            btnAll.classList.add("btn-secondary");

            activeButton.classList.remove("btn-secondary");
            activeButton.classList.add("btn-primary");
                }
            });


            function filterJadwal(location) {
                const rows = jadwalTable.querySelectorAll('tr');
                rows.forEach(row => {
                    if (row.getAttribute('data-location') === location || location === 'All') {
                row.style.display = '';
                    } else {
                row.style.display = 'none';
                    }
                });
            }
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