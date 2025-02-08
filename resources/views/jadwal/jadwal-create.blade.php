<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jadwal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @include ('layout.navbar2')
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h3 class="text-center">Tambah Jadwal Keberangkatan</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <form action="{{ route('jadwal-add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
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
                    <label for="nama_kapal" class="form-label">Pilih Kapal</label>
                    <select class="form-select" id="nama_kapal" name="nama_kapal" required>
                        <option value="">Pilih Kapal</option>
                        <option value="Gilimanuk 1">Gilimanuk 1</option>
                        <option value="Gilimanuk 2">Gilimanuk 2</option>
                    </select>
                    @error('nama_kapal')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tanggal_keberangkatan" class="form-label">Tanggal Keberangkatan</label>
                    <input type="date" class="form-control" id="tanggal_keberangkatan" name="tanggal_keberangkatan"
                        required>
                    @error('tanggal_keberangkatan')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="jam_sandar" class="form-label">Jam Sandar</label>
                    <input type="time" class="form-control" id="jam_sandar" name="jam_sandar" required>
                    @error('jam_sandar')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="jam_keberangkatan" class="form-label">Jam Keberangkatan</label>
                    <input type="time" class="form-control" id="jam_keberangkatan" name="jam_keberangkatan" required>
                    @error('jam_keberangkatan')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="dermaga" class="form-label">Dermaga</label>
                    <select class="form-select" id="dermaga" name="dermaga" required>
                        <option value="">Pilih Dermaga</option>
                        <option value="Dermaga 1">Dermaga 1</option>
                        <option value="Dermaga 2">Dermaga 2</option>
                        <option value="Dermaga 3">Dermaga 3</option>
                    </select>
                    @error('dermaga')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">← Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan Jadwal</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>