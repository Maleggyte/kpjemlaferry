<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Input Data Harian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @include ('layout.navbar2')
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h3 class="text-center">Edit Input Data Harian</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <form action="{{ route('input-update', $input->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label for="pelabuhan" class="form-label">Pilih Pelabuhan</label>
                        <select class="form-select" id="pelabuhan_{{ $input->id }}" name="pelabuhan" required>
                            <option value="">Pilih Pelabuhan</option>
                            <option value="Ketapang" {{ old('pelabuhan', $input->pelabuhan) == 'Ketapang' ? 'selected' : '' }}>Ketapang</option>
                            <option value="Gilimanuk" {{ old('pelabuhan', $input->pelabuhan) == 'Gilimanuk' ? 'selected' : '' }}>Gilimanuk</option>
                        </select>
                        @error('pelabuhan')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>
                <div class="mb-3">
                    <label for="kapal" class="form-label">Pilih Kapal</label>
                    <select class="form-select" id="kapal" name="kapal" required>
                        <option value="">Pilih Kapal</option>
                        <option value="Gilimanuk 1" {{ old('kapal', $input->kapal) == 'Gilimanuk 1' ? 'selected' : '' }}>
                            Gilimanuk 1</option>
                        <option value="Gilimanuk 2" {{ old('kapal', $input->kapal) == 'Gilimanuk 2' ? 'selected' : '' }}>
                            Gilimanuk 2</option>
                    </select>
                    @error('kapal')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tanggal_keberangkatan" class="form-label">Tanggal Keberangkatan</label>
                    <input type="date" class="form-control"
                        value="{{ old('tanggal_keberangkatan', $input->tanggal_keberangkatan) }}"
                        id="tanggal_keberangkatan" name="tanggal_keberangkatan" required>
                    @error('tanggal_keberangkatan')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="jam_keberangkatan" class="form-label">Jam Keberangkatan</label>
                    <input type="time" class="form-control"
                        value="{{ old('jam_keberangkatan', $input->jam_keberangkatan) }}" id="jam_keberangkatan"
                        name="jam_keberangkatan" required>
                    @error('jam_keberangkatan')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="trip" class="form-label">Trip</label>
                    <select class="form-select" value="{{ old('trip', $input->trip) }}" id="trip" name="trip" required>
                        <option value="Reguler" {{ old('trip', $input->trip) == 'Reguler' ? 'selected' : '' }}>Reguler
                        </option>
                        <option value="Sisip" {{ old('trip', $input->trip) == 'Sisip ' ? 'selected' : '' }}>Sisip
                        </option>
                        @error('trip')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>
                <div class="mb-3">
                    <label for="jumlah_trip" class="form-label">Jumlah Trip</label>
                    <select class="form-select" value="{{ old('jumlah_trip', $input->jumlah_trip) }}" id="jumlah_trip"
                        name="jumlah_trip" required>
                        <div class="mb-3">
                            <label for="jumlah_trip" class="form-label">Jumlah Trip</label>
                            <select class="form-select" id="jumlah_trip" name="jumlah_trip" required>
                                <option value="">Pilih Jumlah Trip</option>
                                @for ($i = 1; $i <= 8; $i++)
                                    <option value="{{ $i }}" {{ old('jumlah_trip', $input->jumlah_trip) == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                            @error('jumlah_trip')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @error('jumlah_trip')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>
                <div class="mb-3">
                    <label for="dermaga" class="form-label">Dermaga</label>
                    <select class="form-select" id="dermaga" name="dermaga" required>
                        <option value="">Pilih Dermaga</option>
                        <option value="Dermaga 1" {{ old('dermaga', $input->dermaga) == 'Dermaga 1' ? 'selected' : '' }}>
                            Dermaga 1
                        </option>
                        <option value="Dermaga 2" {{ old('dermaga', $input->dermaga) == 'Dermaga 2' ? 'selected' : '' }}>
                            Dermaga 2
                        </option>
                        <option value="Dermaga 3" {{ old('dermaga', $input->dermaga) == 'Dermaga 3' ? 'selected' : '' }}>
                            Dermaga 3
                        </option>
                    </select>
                    @error('dermaga')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3"
                        required>{{ old('keterangan', $input->keterangan) }}</textarea>
                    @error('keterangan')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="d-flex justify-content-between">
                    <a href="javascript:void(0);" class="btn btn-secondary" onclick="confirmBack()">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan Data Harian</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function confirmBack() {
            // Tampilkan konfirmasi
            const userConfirmed = confirm("Apakah Anda yakin ingin kembali?");

            // Jika pengguna memilih "Ya", kembali ke halaman sebelumnya
            if (userConfirmed) {
                window.history.back();
            }
            // Jika pengguna memilih "Tidak", tetap di halaman ini
        }
    </script>

</body>

</html>