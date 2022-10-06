@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Kategori Data</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-tags"></i> Tambah Kategori data</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.datastatis.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" name="judul" value="{{ old('judul', $data->judul) }}"
                                    placeholder="Masukkan Judul"
                                    class="form-control @error('judul') is-invalid @enderror">

                                @error('kategori')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Isi</label>
                                <textarea class="form-control content @error('isi') is-invalid @enderror" name="isi" placeholder="Masukkan Isi"
                                    rows="10">{!! old('isi', $data->judul) !!}</textarea>
                                @error('isi')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Jenis Kategori</label>
                                <select name="kategori_id" class="form-control @error('data_id') is-invalid @enderror">
                                    <option value="">Pilih Data</option>
                                    @foreach ($kategoridata as $row)
                                        @if ($row->id == $data->kategori_id || $row->id == old('kategori_id'))
                                            <option value="{{ $row->id }}" selected>{{ $row->kategori }}</option>
                                        @else
                                            <option value="{{ $row->id }}">{{ $row->kategori }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('data')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- input type file --}}
                            <div class="form-group">
                                <label>File</label>
                                <input type="file" name="file" class="form-control @error('file') is-invalid @enderror">
                                @error('file')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i>
                                SIMPAN</button>
                            <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i>
                                RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop
@push('after-style')
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
@endpush
