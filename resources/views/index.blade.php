<!DOCTYPE html>
<html>
<head>
    <title>Dropdown</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        .dropdown {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="dropdown">
            <label for="provinsi">Provinsi:</label>
            <select id="provinsi" name="provinsi" class="form-control">
                <option value="">Pilih Provinsi</option>
            </select>
        </div>

        <div class="dropdown">
            <label for="kota">Kota/Kabupaten:</label>
            <select id="kota" name="kota" class="form-control">
                <option value="">Pilih Kota/Kabupaten</option>
            </select>
        </div>

        <div class="dropdown">
            <label for="kecamatan">Kecamatan:</label>
            <select id="kecamatan" name="kecamatan" class="form-control">
                <option value="">Pilih Kecamatan</option>
            </select>
        </div>

        <div class="dropdown">
            <label for="kelurahan">Kelurahan:</label>
            <select id="kelurahan" name="kelurahan" class="form-control">
                <option value="">Pilih Kelurahan</option>
            </select>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            // Mengambil data provinsi dari database
            $.get('/get-province', function(data) {
                console.log(data)
                data.forEach(function(kota) {
                    $('#provinsi').append('<option value="' + kota.id + '">' + kota.name + '</option>');
                });
            });

            // Mengambil data kota/kabupaten saat provinsi dipilih
            $('#provinsi').on('change', function() {
                var provinsiId = $(this).val();
                $('#kota').empty();
                $('#kota').append('<option value="">Pilih Kota/Kabupaten</option>');
                $('#kecamatan').empty();
                $('#kecamatan').append('<option value="">Pilih Kecamatan</option>');
                $('#kelurahan').empty();
                $('#kelurahan').append('<option value="">Pilih Kelurahan</option>');

                if (provinsiId) {
                    $.get('/get-kota/' + provinsiId, function(data) {
                        data.forEach(function(kota) {
                            $('#kota').append('<option value="' + kota.id + '">' + kota.name + '</option>');
                        });
                    });
                }
            });

            // Mengambil data kecamatan saat kota/kabupaten dipilih
            $('#kota').on('change', function() {
                var kotaId = $(this).val();
                $('#kecamatan').empty();
                $('#kecamatan').append('<option value="">Pilih Kecamatan</option>');
                $('#kelurahan').empty();
                $('#kelurahan').append('<option value="">Pilih Kelurahan</option>');

                if (kotaId) {
                    $.get('/get-kecamatan/' + kotaId, function(data) {
                        data.forEach(function(kecamatan) {
                            $('#kecamatan').append('<option value="' + kecamatan.id + '">' + kecamatan.name + '</option>');
                        });
                    });
                }
            });

            // Mengambil data kelurahan saat kecamatan dipilih
            $('#kecamatan').on('change', function() {
                var kecamatanId = $(this).val();
                $('#kelurahan').empty();
                $('#kelurahan').append('<option value="">Pilih Kelurahan</option>');

                if (kecamatanId) {
                    $.get('/get-kelurahan/' + kecamatanId, function(data) {
                        data.forEach(function(kelurahan) {
                            $('#kelurahan').append('<option value="' + kelurahan.id + '">' + kelurahan.name + '</option>');
                        });
                    });
                }
            });
        });
    </script>
</body>
</html>