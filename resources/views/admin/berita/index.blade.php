@extends('layouts.app')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Berita Kota Bogor</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-book-open"></i> Berita Kota Bogor</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.berita.index') }}" method="GET">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                @can('beritas.create')
                                    <div class="input-group-prepend">
                                        <a href="{{ route('admin.berita.create') }}" class="btn btn-primary" style="padding-top: 10px;"><i class="fa fa-plus-circle"></i> TAMBAH</a>
                                    </div>
                                @endcan
                                <input type="text" class="form-control" name="q"
                                       placeholder="cari berdasarkan judul berita">
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
                                <th scope="col">JUDUL BERITA</th>
                                <th scope="col">SLUG</th>
                                <th scope="col">KATEGORI</th>
                                <!-- <th scope="col">FOTO</th> -->
                                <!-- <th scope="col">ISI</th> -->
                                <th scope="col">TGL BERITA</th>
                                <th scope="col" style="width: 15%;text-align: center">AKSI</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($beritas as $no => $brt)
                                <tr>
                                    <th scope="row" style="text-align: center">{{ ++$no + ($beritas->currentPage()-1) * $beritas->perPage() }}</th>
                                    <td>{{ $brt->judul }}</td>
                                    <td>{{ $brt->slug }}</td>
                                    <td>{{ $brt->kategori_berita->kategori }}</td>
                                    <!-- <td><img src="{{ asset('storage/berita/'. $brt->foto) }}" style="width: 150px"></td> -->
                                    <!-- <td>{!! $brt->isi !!}</td> -->
                                    <td>{{ $brt->tgl }}</td>
                                    <td class="text-center">
                                        @can('posts.edit')
                                            <a href="{{ route('admin.berita.edit', $brt->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                        @endcan

                                        @can('posts.delete')
                                            <button onClick="Delete(this.id)" class="btn btn-sm btn-danger" id="{{ $brt->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div style="text-align: center">
                            {{$beritas->links("vendor.pagination.bootstrap-4")}}
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
                        url: "/admin/berita/"+id,
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