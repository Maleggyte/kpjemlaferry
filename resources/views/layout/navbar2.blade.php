<style>
    .navbar {
    padding: 10px 20px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.navbar-brand img {
    max-width: 150px;
    height: auto;
    margin-left: 10px;
}

.navbar-nav .nav-link {
    font-weight: bold;
    color: #333;
    transition: color 0.3s ease;
}

.navbar-nav .nav-link:hover {
    color: #007bff;
}

.btn-primary {
    background-color: #007bff;
    border: none;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.btn-login {
    background-color: #007bff;
    color: white;
    border: none;
    font-weight: bold;
    padding: 10px 20px;
    transition: background-color 0.3s ease;
}

.btn-login:hover {
    background-color: #0056b3;
}

</style>
    
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid mt-5">
            <img src="{{ asset('images/logo_pt.png') }}" alt="Logo" style="width: 250px; height: auto; margin-left: 120px; margin-bottom: 40px;">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav" style="margin-left: 100px; margin-bottom: 40px;">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                    <a class="nav-link" style="margin-left: 40px;" href="#">Jadwal</a>
                </div>
            </div>
        </div>
            <div class="hamburger" id="hamburger">
        &#9776;
    </div>
    </nav>