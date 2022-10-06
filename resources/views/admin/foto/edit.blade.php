@extends('layouts.app')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Foto</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-book-open"></i> Edit Foto</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.foto.update', $data->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>ALBUM</label>
                            <select class="form-control select-category @error('album_id') is-invalid @enderror"
                                name="album_id">
                                <option value="">-- PILIH ALBUM --</option>
                                @foreach ($kategori as $ktg)
                                    @if($data->album_id == $ktg->id)
                                        <option value="{{ $ktg->id  }}" selected>{{ $ktg->judul }}</option>
                                    @else
                                        <option value="{{ $ktg->id  }}">{{ $ktg->judul }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('album_id')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>KETERANGAN FOTO</label>
                            <input type="text" name="keterangan" value="{{ old('judul', $data->keterangan) }}"
                                placeholder="Masukkan Judul foto"
                                class="form-control @error('keterangan') is-invalid @enderror">


                            @error('keterangan')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>FOTO</label>
                            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror">
                        </div>


                        <div class="form-group">
                            <img src="{{ $data->foto }}" width="150px">
                        </div>

                        <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i>
                            UPDATE</button>
                        <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>

                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.6.2/tinymce.min.js"></script>
<script>
    var editor_config = {
        selector: "textarea.content",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
    };

    tinymce.init(editor_config);
</script>
@stop