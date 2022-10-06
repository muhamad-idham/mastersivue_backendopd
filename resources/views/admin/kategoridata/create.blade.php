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
                        <form action="{{ route('admin.kategoridata.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label>Nama Kategori</label>
                                <input type="text" name="kategori" value="{{ old('kategori') }}"
                                    placeholder="Masukkan Nama Kategori"
                                    class="form-control @error('kategori') is-invalid @enderror">

                                @error('kategori')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Isi</label>
                                <textarea class="form-control content @error('isi') is-invalid @enderror" name="isi" placeholder="Masukkan Isi"
                                    rows="10">{!! old('isi') !!}</textarea>
                                @error('isi')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Data</label>
                                <select name="data_id" class="form-control @error('data_id') is-invalid @enderror">
                                    <option value="">Pilih Data</option>
                                    {{-- add old data in option --}}

                                    <option value="0" {{ old('data_id') == '0' ? 'selected' : '' }}>Data Statis</option>
                                    <option value="1" {{ old('data_id') == '1' ? 'selected' : '' }}>Data Dokumen</option>
                                </select>
                                @error('data')
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
