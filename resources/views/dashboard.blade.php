<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Mr+De+Haviland&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
    <title>KP PT Jemla Ferry</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 400px;
            height: 100%;
            background-color: rgb(255, 255, 255);
            color: black;
            padding-top: 20px;
            transform: translateX(-100%);
            transition: transform 0.3s ease;
            z-index: 1000;
        }

        .sidebar.active {
            transform: translateX(0);
        }

        .sidebar .profile {
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar .profile img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .sidebar .profile h4 {
            margin: 0;
            font-size: 1.2rem;
        }

        .sidebar .profile p {
            margin: 0;
            font-size: 0.9rem;
            color: black;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            padding: 15px 20px;
            cursor: pointer;
        }

        .sidebar ul li:hover {
            background-color: white;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: black;
            display: block;
        }

        .sidebar .close-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 1.5rem;
            cursor: pointer;
            color: black;
        }

        /* Tetap putih secara default */
        .collapse ul li a {
            background-color: white;
            color: black;
            text-decoration: none;
            padding: 10px;
            display: block;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        /* Berubah abu-abu saat kursor diarahkan */
        .collapse ul li a:hover {
            background-color: #495057;
            /* Warna abu-abu */
            color: black;
        }


        .hamburger {
            position: fixed;
            top: 60px;
            left: 20px;
            font-size: 1.5rem;
            cursor: pointer;
            z-index: 1000;
        }

        .main-content {
            margin-left: 0;
            transition: margin-left 0.3s ease;
        }

        .main-content.active {
            margin-left: 250px;
        }

        .carousel-inner .background-section {
            height: 500px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            position: relative;
        }

        .carousel-inner .background-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        .carousel-inner .background-section h1,
        .carousel-inner .background-section h2,
        .carousel-inner .background-section h3 {
            position: relative;
            z-index: 2;
        }

        .carousel-inner .background-section h2 {
            font-family: 'Mr De Haviland', cursive;
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .carousel-inner .background-section h1 {
            font-family: 'Roboto', sans-serif;
            font-size: 3rem;
            font-weight: bold;
        }

        .carousel-inner .background-section h3 {
            font-family: 'Roboto', sans-serif;
            font-size: 1.5rem;
            text-align: center;
            margin-top: 20px;
            font-weight: 400;
            width: 80%;
        }

        .search-section {
            text-align: center;
            margin-top: 30px;
        }

        .search-frame {
            display: inline-block;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }

        .search-frame input[type="text"] {
            padding: 10px;
            font-size: 1rem;
            border: 2px solid #ccc;
            border-radius: 5px;
            width: 550px;
            margin-right: 10px;
        }

        .search-frame button {
            padding: 10px 20px;
            font-size: 1rem;
            border: none;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        .search-frame button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <!-- navbar -->
    @include('layout.navbar')
    <!-- /navbar -->


    <!-- sidebar -->
    @isset($auth)
        @include('layout.sidebar', ['auth' => $auth])
    @endisset
    <!-- /sidebar -->

    <div id="backgroundCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="background-section" style="background-image: url('images/gilimanuk1.jpg');">
                    <h2>Ketapang - Gilimanuk</h2>
                    <h1>DATA MUATAN KAPAL GILIMANUK</h1>
                    <h3>Nikmati perjalanan cepat, aman, dan nyaman melintasi Selat Bali dari Ketapang ke Gilimanuk
                        bersama PT. Jemla Ferry.</h3>
                </div>
            </div>
            <div class="carousel-item">
                <div class="background-section" style="background-image: url('images/gilimanuk2.jpg');">
                    <h2>Ketapang - Gilimanuk</h2>
                    <h1>PELAYARAN YANG MENYENANGKAN</h1>
                    <h3>Dengan armada modern dan layanan terbaik, kami hadir untuk memenuhi kebutuhan transportasi Anda.
                    </h3>
                </div>
            </div>
            <div class="carousel-item">
                <div class="background-section" style="background-image: url('images/gambar_kapal.jpg');">
                    <h2>Ketapang - Gilimanuk</h2>
                    <h1>LAYANAN TRANSPORTASI TERBAIK</h1>
                    <h3>Armada kami siap melayani Anda dengan fasilitas lengkap dan jadwal yang fleksibel.</h3>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#backgroundCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#backgroundCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="search-section">
        <div class="search-frame">
            <form action="{{ route('jadwal.search') }}" method="GET">
                <input type="date" id="datepicker" name="tanggal" placeholder="Pilih Tanggal" required>
                <button type="submit">Cari Jadwal</button>
            </form>
        </div>
    </div>
    <div class="container">
        <div class="d-flex justify-content-center mt-3 mb-3">
            <button class="btn btn-secondary me-2" data-location="Ketapang" id="btnKetapang">Ketapang</button>
            <button class="btn btn-secondary" data-location="Gilimanuk" id="btnGilimanuk">Gilimanuk</button>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pelabuhan</th>
                        <th>Nama Kapal</th>
                        <th>Tanggal Keberangkatan</th>
                        <th>Jam Sandar</th>
                        <th>Jam Keberangkatan</th>
                        <th>Dermaga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadwal as $index => $item)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>{{ $item->pilih_pelabuhan }}</td>
                            <td>{{ $item->nama_kapal }}</td>
                            <td>{{ $item->tanggal_keberangkatan }}</td>
                            <td>{{ $item->jam_sandar }}</td>
                            <td>{{ $item->jam_keberangkatan }}</td>
                            <td>{{ $item->dermaga }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>



    @include ('layout.footer')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+pmnsKAu6UJ0kBlFDi7j7zw5RJJ0y"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("#datepicker", {
            dateFormat: "Y-m-d",
            allowInput: true
        });

        const hamburger = document.getElementById('hamburger');
        const sidebar = document.getElementById('sidebar');
        const closeBtn = document.getElementById('close-btn');
        const mainContent = document.getElementById('main-content');

        hamburger.addEventListener('click', () => {
            sidebar.classList.toggle('active');
            mainContent.classList.toggle('active');

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
        });

        closeBtn.addEventListener('click', () => {
            sidebar.classList.remove('active');
            mainContent.classList.remove('active');
        });
    </script>
</body>

</html>