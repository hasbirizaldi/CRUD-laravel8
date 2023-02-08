<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Data Pegawai</title>
  </head>
  <body>

<div class="container">
    
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center">Data Pegawai</h3>
            <a href="/tambah-pegawai" class="btn btn-sm btn-primary mb-2">Tambah Data</a>
          

            <div class="row">
              <div class="col-md-6">
                <div class="input-group mb-3">
                  <form action="/pegawai" method="get">
                    <input type="search" class="form-control" name="search" id="search" placeholder="Cari...">
                  </form>
                </div>
              </div>
            </div>
            <a href="/exportPDF" class="btn btn-sm btn-info mb-2 text-light"> Exsport PDF</a>
            <a href="/exportExcel" class="btn btn-sm btn-warning mb-2 text-light"> Exsport Excel</a>

            <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Import Data
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/importExcel" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <input type="file" name="file" class="form-control" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Import</button>
          </div>
        </form>
      </div>
      
    </div>
  </div>
</div>

                {{-- @if ($message=Session::get('success'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    Data Berhasil {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif --}}
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">No. Telepon</th>
                    <th scope="col">Tanggal Dibuat</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $d)
                  <tr>
                    <td>{{ $data->firstItem() + $loop->index }}</td>
                    <td>{{ $d->nama }}</td>
                    <td>{{ $d->jenisKelamin }}</td>
                    <td>0{{ $d->no_tlp }}</td>
                    <td>{{ $d->created_at->format('d-M-Y') }}</td>
                    <td>
                        <img width="100px" src="{{ asset('img_pegawai/'. $d->img) }}">
                    </td>
                    <td>
                        <a href="/edit/{{ $d->id }}" class="btn btn-sm btn-primary">Edit</a>
                        <a href="/delete-data/{{ $d->id }}" class="btn btn-sm btn-danger delete" >Hapus</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

              {{ $data->links() }}

        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/my.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
      @if (Session::has('success'))
      toastr.success('Data Berhasil {{ Session::get('success') }}')
      @endif
      
    </script>
  </body>
</html>