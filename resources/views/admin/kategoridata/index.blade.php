@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Kategori Data</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-tags"></i> Kategori Data</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.kategoridata.index') }}" method="GET">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    @can('katdatas.create')
                                        <div class="input-group-prepend">
                                            <a href="{{ route('admin.kategoridata.create') }}" class="btn btn-primary" style="padding-top: 10px;"><i class="fa fa-plus-circle"></i> TAMBAH</a>
                                        </div>
                                    @endcan
                                    <input type="text" class="form-control" name="q"
                                           placeholder="cari berdasarkan judul agenda">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> CARI
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" style="text-align: center;width: 6%">NO.</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Slug</th>
                                        <th scope="col">Isi</th>
                                        <th scope="col">Data</th>
                                        <th scope="col" style="width: 15%;text-align: center">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $no => $row)
                                        <tr>
                                            <th scope="row" style="text-align: center">
                                                {{ ++$no + ($data->currentPage() - 1) * $data->perPage() }}</th>
                                            <td>{{ $row->kategori }}</td>
                                            <td>{{ $row->slug }}</td>
                                            <td>{!! $row->isi !!}</td>
                                            <td>{{ $row->data_id == 0 ? 'Data Statis' : 'Data Dokumen' }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.kategoridata.edit', $row->id) }}"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </a>
                                                <button onClick="Delete(this.id)" class="btn btn-sm btn-danger"
                                                    id="{{ $row->id }}">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div style="text-align: center">
                                {{ $data->links('vendor.pagination.bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection
@push('after-style')
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet"
        href="https://demo.getstisla.com/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
@endpush
@push('after-script')
    <script src="https://demo.getstisla.com/assets/modules/datatables/datatables.min.js"></script>
    <script src="https://demo.getstisla.com/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://demo.getstisla.com/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
    <script src="https://demo.getstisla.com/assets/modules/jquery-ui/jquery-ui.min.js"></script>

    <script>

        //ajax delete
        function Delete(id) {
            var id = id;
            var token = $("meta[name='csrf-token']").attr("content");

            swal({
                title: "APAKAH KAMU YAKIN ?",
                text: "INGIN MENGHAPUS DATA INI!",
                icon: "warning",
                buttons: [
                    'TIDAK',
                    'YA'
                ],
                dangerMode: true,
            }).then(function(isConfirm) {
                if (isConfirm) {

                    //ajax delete
                    jQuery.ajax({
                        url: "/admin/kategoridata/" + id,
                        data: {
                            "id": id,
                            "_token": token,
                            "_method": "DELETE"
                        },
                        type: 'DELETE',
                        success: function(response) {
                            if (response.status == "success") {
                                swal({
                                    title: 'BERHASIL!',
                                    text: 'DATA BERHASIL DIHAPUS!',
                                    icon: 'success',
                                    timer: 1000,
                                    showConfirmButton: false,
                                    showCancelButton: false,
                                    buttons: false,
                                }).then(function() {
                                    location.reload();
                                });
                            } else {
                                swal({
                                    title: 'GAGAL!',
                                    text: 'DATA GAGAL DIHAPUS!',
                                    icon: 'error',
                                    timer: 1000,
                                    showConfirmButton: false,
                                    showCancelButton: false,
                                    buttons: false,
                                }).then(function() {
                                    location.reload();
                                });
                            }
                        }
                    });

                } else {
                    return true;
                }
            })
        }
    </script>
@endpush
