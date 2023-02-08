<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Tambah Data</title>
  </head>
  <body>

<div class="container">
    <div class="row  justify-content-center">
      <h3 class="text-center">Tambah Data Pegawai</h3>
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <form action="/insert-data" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="">Nama</label>
                <input type="text" name="nama" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Jenis Kelamin</label>
                <select name="jenisKelamin" class="form-control">
                  <option selected>Pilih</option>
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">Nomer Telepon</label>
                <input type="number" name="no_tlp" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Upload Foto</label>
                <input type="file" name="img" class="form-control">
              </div>
              <button type="submit" class="btn btn-primary mt-3">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>