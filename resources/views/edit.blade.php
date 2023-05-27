<!doctype html>
<html lang="en">

<head>
    <title>Edit Barang</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Heebo:300,400,400i,700&display=fallback">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">

    <!-- jQuery -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
</head>

<body>
    <header>
        <!-- place navbar here -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">JWP 2023</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('barang.index') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('barang.create') }}">Tambah data</a>
                        </li>
                    </ul>
                    <span class="navbar-text">
                        Pelaksanaan Sertifikasi Kompetensi Kerja Tahun 2023
                    </span>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container my-4">
            <form action="{{ route('barang.update', $barang->kode_barang) }}" method="post">
                <div class="card mb-4">
                    <div class="card-title">
                        <h5 class="card-header">Form edit barang</h5>
                    </div>
                    <div class="card-body">
                        @csrf
                        <div class="mb-3">
                            <label for="kode_barang" class="form-label">Kode barang</label>
                            <input type="text" class="form-control @error('kode_barang')
                            is-invalid
                            @enderror" value="{{ old('kode_barang', $barang->kode_barang) }}" name="kode_barang" id="kode_barang" maxlength="16"
                                minlength="8" placeholder="Kode barang" readonly>
                            @error('kode_barang')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nama_barang" class="form-label">Nama barang</label>
                            <input type="text" class="form-control @error('nama_barang')
                            is-invalid
                            @enderror" value="{{ old('nama_barang', $barang->nama_barang) }}" name="nama_barang" id="nama_barang" placeholder="Nama barang">
                            @error('nama_barang')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="jenis" class="form-label">Jenis barang</label>
                            <input type="text" class="form-control @error('jenis')
                            is-invalid
                            @enderror" value="{{ old('jenis', $barang->jenis) }}" name="jenis" id="jenis" placeholder="Jenis">
                            @error('jenis')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="satuan" class="form-label">Satuan barang</label>
                            <input type="text" class="form-control @error('satuan')
                            is-invalid
                            @enderror" value="{{ old('satuan', $barang->satuan) }}" name="satuan" id="satuan" placeholder="Satuan barang">
                            @error('satuan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="merk" class="form-label">Merk barang</label>
                            <input type="text" class="form-control @error('merk')
                            is-invalid
                            @enderror" value="{{ old('merk', $barang->merk) }}" name="merk" id="merk" placeholder="Merk barang">
                            @error('merk')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="produsen" class="form-label">Nama Produsen</label>
                            <input type="text" class="form-control @error('produsen')
                            is-invalid
                            @enderror" value="{{ old('produsen', $barang->produsen) }}" name="produsen" id="produsen" placeholder="Nama Produsen">
                            @error('produsen')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="harga_beli" class="form-label">Harga beli</label>
                            <input type="number" step="1" class="form-control @error('harga_beli')
                            is-invalid
                            @enderror" value="{{ old('harga_beli', $barang->harga_beli) }}" name="harga_beli" id="harga_beli" placeholder="Harga beli">
                            @error('harga_beli')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <button type="reset" class="btn btn-secondary" style="margin-right: 10px">Reset</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>

    <!-- Bootstrap 4 -->
    <script src="{{asset('assets/dashboard-template/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

</body>

</html>
