<!doctype html>
<html lang="en">

<head>
    <title>Index Barang</title>
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

    {{-- Sweetalert 2 --}}
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>

    {{-- Datatable --}}
    <link rel="stylesheet"
        href="{{ asset('assets/dashboard-template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/dashboard-template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/dashboard-template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
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
                            <a class="nav-link active" aria-current="page" href="{{ route('barang.index') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('barang.create') }}">Tambah data</a>
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
        {{-- Sweetalert --}}
        @if (session()->has('success'))
        <script>
            Swal.fire("Berhasil", "{{ session()->get('success') }}", "success")
        </script>            
        @endif

        @if (session()->has('error'))
        <script>
            Swal.fire("Error", "{{ session()->get('error') }}", "error")
        </script>            
        @endif
        
        <div class="container mt-4">
            <table class="table table-responsive dataTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kode Barang</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Satuan</th>
                        <th scope="col">Merk</th>
                        <th scope="col">Produsen</th>
                        <th scope="col">Harga beli</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listBarang as $index => $barang)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $barang->kode_barang }}</td>
                        <td>{{ $barang->nama_barang }}</td>
                        <td>{{ $barang->jenis }}</td>
                        <td>{{ $barang->satuan }}</td>
                        <td>{{ $barang->merk }}</td>
                        <td>{{ $barang->produsen }}</td>
                        <td>{{ 'Rp. ' . number_format($barang->harga_beli, 0, ',', '.') }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="btnakso">
                                <a href="{{ route('barang.edit', $barang->kode_barang) }}" class="btn btn-warning" ><i class="fas fa-edit"></i> Edit</a>
                                <button type="button" class="btn btn-danger"
                                    onclick="deleteData('{{ $barang->kode_barang }}')"><i class="fas fa-times mr-1"></i>
                                    Delete</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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

    {{-- Datatable --}}
    <script src="{{ asset('assets/dashboard-template/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard-template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}">
    </script>
    <script
        src="{{ asset('assets/dashboard-template/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}">
    </script>
    <script
        src="{{ asset('assets/dashboard-template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}">
    </script>
    <script src="{{ asset('assets/dashboard-template/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}">
    </script>
    <script src="{{ asset('assets/dashboard-template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}">
    </script>



    <script>
        $(document).ready(function () {
            // DataTable
            $('.dataTable').dataTable({
                "responsive": true,
                "theme": 'bootstrap-4',
                "language": {
                    "decimal": "",
                    "emptyTable": "Tidak ada data yang ditemukan",
                    "info": "Menampilkan data ke _START_ - _END_ dari _TOTAL_ data",
                    "infoEmpty": "Menampilkan 0 dari 0 data",
                    // "infoFiltered": "(Difilter dari _MAX_ data)",
                    "infoFiltered": "",
                    "infoPostFix": "",
                    "thousands": ".",
                    "lengthMenu": "Menampilkan _MENU_ data",
                    "loadingRecords": "",
                    "processing": "",
                    "search": "Cari:",
                    "zeroRecords": "Tidak ada data yang sesuai",
                    "paginate": {
                        "first": "Pertama",
                        "last": "Terakhir",
                        "next": "Selanjutnya",
                        "previous": "Sebelumnya"
                    },
                },
            })
        })

        // Sweetalert Konfirmasi Delete
        function deleteData(id) {
            Swal.fire({
                title: 'Konfirmasi',
                text: "Apakah data barang ingin hapus ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#dc3545',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak',
                backdrop: true,
                showLoaderOnConfirm: true,
                preConfirm: function () {
                    return new Promise(function (resolve, reject) {
                        $.ajax({
                            type: 'POST',
                            url: "{{ route('barang.delete') }}",
                            data: {
                                id: id
                            }
                        }).done(function (response) {
                            // console.log(response)
                            if (response.status == 'success') {
                                Swal.fire("Sukses", response.message, "success").then(
                                    function () {
                                        location.reload();
                                    })
                            } else {
                                Swal.fire("Galat", response.message, "error").then(
                                    function () {
                                        location.reload();
                                    })
                            }
                        })
                    })
                },
                allowOutsideClick: () => !Swal.isLoading()
            })
        }

    </script>
</body>

</html>
