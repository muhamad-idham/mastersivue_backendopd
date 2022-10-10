@extends('layouts.app')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Banner</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-book-open"></i> Edit Banner</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.banner.update', $data->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>JUDUL BANNER</label>
                            <input type="text" name="judul" value="{{ old('judul', $data->judul) }}"
                                placeholder="Masukkan Judul banner"
                                class="form-control @error('judul') is-invalid @enderror">


                            @error('judul')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>KATEGORI</label>
                            <select class="form-control select-category @error('kategori_id') is-invalid @enderror"
                                name="kategori_id">
                                <option value="">-- PILIH KATEGORI --</option>
                                @foreach ($kategori as $ktg)
                                    @if($data->kategori_id == $ktg->id)
                                        <option value="{{ $ktg->id  }}" selected>{{ $ktg->kategori }}</option>
                                    @else
                                        <option value="{{ $ktg->id  }}">{{ $ktg->kategori }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('kategori_id')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>LINK BANNER</label>
                            <input type="text" name="link" value="{{ old('link', $data->link) }}"
                                placeholder="Masukkan Link Banner"
                                class="form-control @error('link') is-invalid @enderror">


                            @error('link')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>TANGGAL PUBLISH</label>
                            <input type="date" name="tgl_publish" class="form-control @error('tgl_publish') is-invalid @enderror" value="{{ old('tgl_publish', $data->tgl_publish) }}">

                            @error('tgl_publish')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>GAMBAR</label>
                            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror">
                        </div>


                        <div class="form-group">
                            <img src="{{ $data->gambar }}" width="150px">
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="0" {{ $data->status == '0' ? 'selected' : '' }}>Aktif</option>
                                <option value="1" {{ $data->status == '1' ? 'selceted' : '' }}>Tidak Aktif</option>
                            </select>
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