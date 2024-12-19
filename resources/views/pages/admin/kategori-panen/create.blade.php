@extends('layouts.admin/app', ['title' => 'Tambah Kategori Panen'])


@section('content')
  <form action="{{ route('admin.kategori-panen.store') }}" method="POST">
    @csrf
    {{-- Input Nama Kategori --}}
    <div class="mb-3">
      <label class="form-label" for="nama_kategori">Nama Kategori</label>
      <input type="text" id="nama_kategori" name="nama_kategori" class="form-control"
        value="{{ request()->get('nama_kategori') }}" placeholder="Masukkan nama kategori panen">
      @error('nama_kategori')
        <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>

    {{-- Input Deskripsi --}}
    <div class="mb-3">
      <label for="deskripsi" class="form-label">Deskripsi Kategori</label>
      <textarea name="deskripsi" id="deskripsi" class="form-control ckeditor"
        placeholder="Masukkan deskripsi kategori panen">
    </textarea>
      @error('deskripsi')
        <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>

    <div class="w-100 d-flex gap-1 justify-content-end">
      <button type="button" class="btn btn-secondary">
        <a href="{{ route('admin.pengguna.index') }}" class="text-white">Tutup</a>
      </button>
      <button type="submit" class="btn btn-primary">Tambah Kategori Panen</button>
    </div>
  </form>
@endsection


@push('js')
  <script src="https://cdn.ckeditor.com/ckeditor5/44.1.0/ckeditor5.umd.js" crossorigin></script>

  <script>
    const {
      ClassicEditor,
      Essentials,
      Bold,
      Italic,
      Font,
      Paragraph
    } = CKEDITOR;

    ClassicEditor.create(document.querySelector('#deskripsi'), {
        licenseKey: 'eyJhbGciOiJFUzI1NiJ9.eyJleHAiOjE3NjYxMDIzOTksImp0aSI6IjgwNTVjMDQ0LTk3MDYtNDUyNi1iY2JhLTAzMzZlMDM4ODczYyIsImxpY2Vuc2VkSG9zdHMiOlsiMTI3LjAuMC4xIiwibG9jYWxob3N0IiwiMTkyLjE2OC4qLioiLCIxMC4qLiouKiIsIjE3Mi4qLiouKiIsIioudGVzdCIsIioubG9jYWxob3N0IiwiKi5sb2NhbCJdLCJ1c2FnZUVuZHBvaW50IjoiaHR0cHM6Ly9wcm94eS1ldmVudC5ja2VkaXRvci5jb20iLCJkaXN0cmlidXRpb25DaGFubmVsIjpbImNsb3VkIiwiZHJ1cGFsIl0sImxpY2Vuc2VUeXBlIjoiZGV2ZWxvcG1lbnQiLCJmZWF0dXJlcyI6WyJEUlVQIiwiQk9YIl0sInZjIjoiZWZlYjEyNDAifQ.czuiyf5E0jFwwYnM5C4dy097Scr0-en8C_eLF5l7XCmm8ds95rbHpFBDA7lwsIHG7OwfOqtjOB2eeDcLVQtl0w',
        plugins: [
          CKEDITOR.Essentials,
          CKEDITOR.Bold,
          CKEDITOR.Italic,
          CKEDITOR.Font,
          CKEDITOR.Paragraph,
        ],
        toolbar: [
          'undo', 'redo', '|', 'bold', 'italic', '|',
          'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|',
          'formatPainter',
        ],
      })
      .then(editor => {
        console.log('Editor berhasil diinisialisasi:', editor);
      })
      .catch(error => {
        console.error('Kesalahan inisialisasi editor:', error);
      });
  </script>
@endpush
