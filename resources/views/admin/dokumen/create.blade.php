@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Dokumen</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-book"></i> Tambah Dokumen</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.dokumen.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>JUDUL DOKUMEN</label>
                                <input type="text" name="judul" value="{{ old('judul') }}" placeholder="Masukkan Judul Dokumen" class="form-control @error('judul') is-invalid @enderror">

                                @error('judul')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>KATEGORI</label>
                                        <select class="form-control select-category @error('kategori_id') is-invalid @enderror" name="kategori_id">
                                            <option value="">-- PILIH KATEGORI --</option>
                                            @foreach ($kategori as $ktg)
                                                <option value="{{ $ktg->id }}">{{ $ktg->kategori }}</option>
                                            @endforeach
                                        </select>
                                        @error('kategori_id')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label>FILE</label>
                                            <input type="file" name="file" class="form-control @error('file') is-invalid @enderror">
                                            @error('file')
                                                <div class="invalid-feedback" style="display: block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>ISI</label>
                                <textarea class="form-control content @error('isi') is-invalid @enderror" name="isi" placeholder="Masukkan Konten / Isi Dokumen" rows="10">{!! old('isi') !!}</textarea>
                                @error('isi')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> SIMPAN</button>
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