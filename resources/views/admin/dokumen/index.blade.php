@extends('layouts.app')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dokumen</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-book"></i> Dokumen</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.dokumen.index') }}" method="GET">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                @can('dokumens.create')
                                    <div class="input-group-prepend">
                                        <a href="{{ route('admin.dokumen.create') }}" class="btn btn-primary" style="padding-top: 10px;"><i class="fa fa-plus-circle"></i> TAMBAH</a>
                                    </div>
                                @endcan
                                <input type="text" class="form-control" name="q"
                                       placeholder="cari berdasarkan judul dokumen">
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
                                <th scope="col">JUDUL DOKUMEN</th>
                                <th scope="col">KATEGORI</th>
                                <th scope="col">FILE</th>
                                <th scope="col">ISI</th>
                                <th scope="col" style="width: 15%;text-align: center">AKSI</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($dokumens as $no => $dokumen)
                                <tr>
                                    <th scope="row" style="text-align: center">{{ ++$no + ($dokumens->currentPage()-1) * $dokumens->perPage() }}</th>
                                    <td>{{ $dokumen->judul }}</td>
                                    <td>{{ $dokumen->kategori_data->kategori }}</td>
                                    <td><a href="{{ asset('storage/dokumen/'.$dokumen->file) }}" class="btn btn-sm btn-danger" target="blank">
                                        <i class="fas fa-file-pdf"></i>
                                    </a></td>
                                    <td>{{ $dokumen->isi }}</td>
                                    <td class="text-center">
                                        @can('dokumens.edit')
                                            <a href="{{ route('admin.dokumen.edit', $dokumen->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                        @endcan

                                        @can('dokumens.delete')
                                            <button onClick="Delete(this.id)" class="btn btn-sm btn-danger" id="{{ $dokumen->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div style="text-align: center">
                            {{$dokumens->links("vendor.pagination.bootstrap-4")}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>

<script>
    //ajax delete
    function Delete(id)
        {
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
                        url: "/admin/dokumen/"+id,
                        data:     {
                            "id": id,
                            "_token": token
                        },
                        type: 'DELETE',
                        success: function (response) {
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
                            }else{
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
@stop