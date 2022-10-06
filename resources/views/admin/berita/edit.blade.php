@extends('layouts.app')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Berita</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-book-open"></i> Edit Berita</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.berita.update', $data->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>JUDUL BERITA</label>
                            <input type="text" name="judul" value="{{ old('judul', $data->judul) }}"
                                placeholder="Masukkan Judul Berita"
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
                            <label>KONTEN</label>
                            <textarea class="form-control content @error('isi') is-invalid @enderror" name="isi"
                                placeholder="Masukkan Konten / Isi Berita"
                                rows="10">{!! old('isi', $data->isi) !!}</textarea>
                            @error('isi')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>TANGGAL</label>
                            <input type="date" name="tgl" class="form-control @error('tgl') is-invalid @enderror" value="{{ old('judul', $data->tgl) }}">

                            @error('tgl')
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
                            <img src="{{ $data->foto }}" width="150px">
                            <!-- <img src="{{$data->foto }}" width="150px"> -->
                            <!-- <label>GAMBAR</label> -->
                        </div>
                        
                        <div class="form-group">
                            <label class="font-weight-bold">TAGS</label>
                            <select class="form-control" name="tags[]"
                                multiple="multiple">
                                @foreach ($tags as $tag)
                                    <option value="{{$tag->id}}" {{ in_array($tag->id, $data->tags()->pluck('id')->toArray()) ? 'selected' : '' }}> {{ $tag->name }}</option>
                                @endforeach
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