<div class="sidebar" id="sidebar">
    <div class="close-btn" id="close-btn">&#10005;</div>
    <div class="profile">
        @isset($auth)
            <img src="#" alt="Profile Picture">
            <h4>{{ $auth->nama }}</h4>
            <p>{{ $auth->role }}</p>
            <p>{{ $auth->email }}</p>
        @endisset
    </div>

    <ul>
        <li>
            <h3 style="font-weight: bold; text-align: center;">DEP. OPERASIONAL</h3>
        </li>
        @if(Auth::check() && Auth::user()->role == 'admin')
            <li><a href="/karyawan-read">DATA KARYAWAN</a></li>
        @endif
        <li><a href="/kondisiharian-read">Kondisi Harian</a></li>
        <li><a href="/inputdataharian-read">Input Data Harian</a></li>
        <li><a href="/inputdatamuatan-read">Input Data Muatan</a></li>
        <li><a href="/jadwal-read">Jadwal</a></li>
        <li><a href="/akunsaya-read">Akun Saya</a></li>
    </ul>
</div>