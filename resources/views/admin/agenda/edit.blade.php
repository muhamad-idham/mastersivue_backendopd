@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Agenda</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-bell"></i> Edit Agenda</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.agenda.update', $agenda->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>NAMAs AGENDA</label>
                                <input type="text" name="nama_agenda" value="{{ old('titnama_agendale', $agenda->nama_agenda) }}" placeholder="Masukkan Nama Agenda" class="form-control @error('nama_agenda') is-invalid @enderror">

                                @error('nama_agenda')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>LOKASI AGENDA</label>
                                        <input type="text" name="lokasi_agenda" value="{{ old('lokasi_agenda', $agenda->lokasi_agenda) }}" placeholder="Masukkan Lokasi Agenda" class="form-control @error('lokasi_agenda') is-invalid @enderror">
        
                                        @error('lokasi_agenda')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>TANGGAL</label>
                                        <input type="date" name="tgl_agenda" value="{{ old('tgl_agenda', $agenda->tgl_agenda) }}" class="form-control @error('tgl_agenda') is-invalid @enderror">
        
                                        @error('tgl_agenda')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>KETERANGAN</label>
                                <textarea class="form-control content @error('keterangan') is-invalid @enderror" name="keterangan" placeholder="Masukkan Konten / Isi Agenda" rows="10">{!! old('keterangan', $agenda->keterangan) !!}</textarea>
                                @error('keterangan')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> UPDATE</button>
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