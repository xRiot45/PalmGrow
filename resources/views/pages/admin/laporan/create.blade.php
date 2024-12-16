@extends('layouts.vertical', ['title' => 'Tambah Laporan'])

@section('css')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dropzone@5.7.0/dist/dropzone.css" />
  @vite(['node_modules/choices.js/public/assets/styles/choices.min.css'])
@endsection

@section('content')
  <form method="POST" action="{{ route('admin.laporan.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">
      {{-- Kebun Start --}}
      <div class="col-md-6 mb-3">
        <label class="form-label" for="kebun_id">Kebun</label>
        <select name="kebun_id" id="kebun_id" class="form-control" aria-label="Pilih Pengguna"
          data-choices data-choices-search-true data-choices-removeItem>
          <option value="">-- Pilih Kebun --</option>
          @foreach ($lokasi_kebun as $lokasi)
            <option value="{{ $lokasi->id }}">{{ $lokasi->lokasi }}</option>
          @endforeach
        </select>
        @error('kebun_id')
          <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      {{-- Kebun End --}}

      {{-- Tanggal Laporan Start --}}
      <div class="col-md-6 mb-3">
        <label class="form-label" for="tanggal_laporan">
          Tanggal Laporan
        </label>
        <input type="date" id="tanggal_laporan" class="form-control"
          placeholder="-- Pilih Tanggal --" name="tanggal_laporan"
          value="{{ request()->get('tanggal_laporan') }}">
        @error('tanggal_laporan')
          <span class="text-danger error-message">{{ $message }}</span>
        @enderror
      </div>
      {{-- Tanggal Laporan End --}}
    </div>

    {{-- Upload File Start --}}
    {{-- <div>
      <label class="form-label" for="file_type">
        Upload Laporan
      </label>
      <div class="dropzone">

        <div class="fallback">
          <input name="file_type" type="file">
        </div>
        <div class="dz-message needsclick">
          <i class="h1 bx bx-cloud-upload text-primary"></i>
          <h3>Letakkan berkas di sini atau <span class="text-primary"> klik untuk mengunggah.</span>
          </h3>
          <span class="text-muted fs-12">
            Harap unggah berkas dalam format PDF, JPG, JPEG, atau PNG
          </span>
        </div>
      </div>
    </div>

    <ul class="list-unstyled mb-0" id="dropzone-preview">
      <li class="mt-2" id="dropzone-preview-list">
        <div class="border rounded">
          <div class="d-flex p-2">
            <div class="flex-shrink-0 me-3">
              <div class="avatar-sm bg-light rounded">
                <img data-dz-thumbnail class="img-fluid rounded d-block" src="#"
                  alt="Dropzone-Image" />
              </div>
            </div>
            <div class="flex-grow-1">
              <div class="pt-1">
                <h5 class="fs-14 mb-1" data-dz-name>&nbsp;</h5>
                <p class="fs-13 text-muted mb-0" data-dz-size></p>
                <strong class="error text-danger" data-dz-errormessage></strong>
              </div>
            </div>
            <div class="flex-shrink-0 ms-3">
              <button data-dz-remove class="btn btn-sm btn-danger">Hapus</button>
            </div>
          </div>
        </div>
      </li>
    </ul> --}}
    <input type="file" name="file_path" class="form-control" value="{{ old('file_path') }}">
    @error('file_path')
      <span class="text-danger error-message">{{ $message }}</span>
    @enderror
    {{-- Upload File End --}}


    <div class="w-100 d-flex gap-1 justify-content-end mt-4">
      <button type="button" class="btn btn-secondary">
        <a href="{{ route('admin.laporan.index') }}" class="text-white">Kembali</a>
      </button>
      <button type="submit" class="btn btn-primary">Tambah Laporan</button>
    </div>
  </form>

  <script src="https://cdn.jsdelivr.net/npm/dropzone@5.7.0/dist/dropzone.min.js"></script>

  {{-- <script>
    var dropzonePreviewNode = document.querySelector("#dropzone-preview-list");
    dropzonePreviewNode.id = "";
    if (dropzonePreviewNode) {
      var previewTemplate = dropzonePreviewNode.parentNode.innerHTML;
      dropzonePreviewNode.parentNode.removeChild(dropzonePreviewNode);
      let dropzone = new Dropzone(".dropzone", {
        url: '{{ route('admin.laporan.store') }}',
        method: "post",
        previewTemplate: previewTemplate,
        previewsContainer: "#dropzone-preview",
        uploadMultiple: false,
        maxFiles: 1,
        maxFilesize: 2,
        acceptedFiles: "application/pdf,image/jpg,image/jpeg,image/png",
        dictDefaultMessage: "Letakkan berkas di sini atau klik untuk mengunggah.",
        dictMaxFilesExceeded: "Hanya dapat mengunggah satu file.",
        dictFileTooBig: "File terlalu besar. Maksimal ukuran file adalah 5MB.",
        init: function() {
          this.on("sending", function(file, xhr, formData) {
            formData.append("kebun_id", document.getElementById('kebun_id').value);
            formData.append("tanggal_laporan", document.getElementById('tanggal_laporan')
              .value);
            formData.append("_token", document.querySelector('input[name="_token"]')
              .value); // CSRF token
          });
        }
      });

    }
  </script> --}}
@endsection
