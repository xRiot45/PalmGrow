@extends('layouts.vertical', ['title' => 'Laporan'])

@section('css')
  @vite(['node_modules/choices.js/public/assets/styles/choices.min.css'])
@endsection

@section('content')
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header d-lg-flex justify-content-between align-items-center gap-1">
          <h4 class="card-title flex-grow-1">Daftar Laporan</h4>
          <div class="d-flex flex-wrap  gap-1 mt-lg-0 mt-3">
            {{-- Button Tambah Laporan --}}
            <a href="{{ route('admin.laporan.create') }}" class="btn btn-md btn-primary">
              <iconify-icon icon="ic:baseline-plus" class="align-middle fs-18">
              </iconify-icon>
              Tambah Laporan
            </a>

            {{-- Button Modal --}}
            <button type="button"
              class="btn btn-md d-flex gap-1 justify-content-between align-items-center btn-success"
              data-bs-toggle="modal" data-bs-target="#filterModal">
              <iconify-icon icon="mage:filter" class="align-middle fs-18">
              </iconify-icon>
              Filter
            </button>

            {{-- Button Refresh Halaman --}}
            <a href="{{ route('admin.laporan.index') }}" class="btn btn-md btn-secondary">
              <iconify-icon icon="ic:baseline-refresh" class="align-middle fs-18">
              </iconify-icon>
              Refresh
            </a>

            {{-- Modal Filter Start --}}
            <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel"
              aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="filterModalLabel">Filter Data Laporan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                      aria-label="Close"></button>
                  </div>

                  {{-- Modal Body Start --}}
                  <div class="modal-body">
                    <form action="{{ route('admin.laporan.index') }}" method="GET">
                      {{-- Lokasi Kebun --}}
                      <div class="mb-3">
                        <label class="form-label" for="lokasi_kebun">Lokasi Kebun</label>
                        <select name="lokasi_kebun" id="lokasi_kebun" class="form-control"
                          aria-label="Pilih Pengguna" data-choices data-choices-search-true
                          data-choices-removeItem>
                          <option value="">-- Pilih Lokasi Kebun --</option>
                          @foreach ($lokasi_kebun as $lokasi)
                            <option value="{{ $lokasi->lokasi }}"
                              {{ request()->get('lokasi_kebun') == $lokasi->lokasi ? 'selected' : '' }}>
                              {{ $lokasi->lokasi }}
                            </option>
                          @endforeach
                        </select>
                      </div>

                      {{-- Tanggal Laporan --}}
                      <div class="d-flex gap-2">
                        <div class="mb-3 w-100">
                          <label class="form-label" for="tanggal_laporan_mulai">
                            Tanggal Laporan Mulai
                          </label>
                          <input type="date" id="tanggal_laporan_mulai" class="form-control"
                            placeholder="-- Pilih Tanggal --" name="tanggal_laporan_mulai"
                            value="{{ request()->get('tanggal_laporan_mulai') }}">
                        </div>
                        <div class="mb-3 w-100">
                          <label class="form-label" for="tanggal_laporan_selesai">
                            Tanggal Laporan Selesai
                          </label>
                          <input type="date" id="tanggal_laporan_selesai" class="form-control"
                            placeholder="-- Pilih Tanggal --" name="tanggal_laporan_selesai"
                            value="{{ request()->get('tanggal_laporan_selesai') }}">
                        </div>
                      </div>

                      {{-- Button Submit --}}
                      <div class="w-100 d-flex gap-1 justify-content-end">
                        <button type="button" class="btn btn-secondary"
                          data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Cari Laporan</button>
                      </div>
                    </form>
                  </div>
                  {{-- Modal Body End --}}
                </div>
              </div>
            </div>
            {{-- Modal Filter End --}}
          </div>
        </div>

        {{-- Table Start --}}
        <div class="table-responsive">
          <table class="table align-middle mb-0 table-hover table-centered">

            {{-- Table Head Start --}}
            <thead class="bg-light-subtle">
              <tr>
                <th class="px-4">No</th>
                <th>Lokasi Kebun</th>
                <th>Tanggal Laporan</th>
                <th>Bukti Laporan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            {{-- Table Head End --}}

            {{-- Table Body Start --}}
            <tbody>
              @if (empty($data))
                <tr>
                  <td colspan="6" class="text-center">
                    <img src="/images/404-error.png" alt="Not Found Img" class="w-25 h-25">
                    <h4 class="fw-bold">Data Tidak Ditemukan</h4>
                  </td>
                </tr>
              @else
                @foreach ($data as $index => $laporan)
                  <tr>
                    {{-- No --}}
                    <td class="px-4">
                      {{ $loop->iteration + ($pagination->currentPage() - 1) * $pagination->perPage() }}
                    </td>

                    {{-- Lokasi Kebun --}}
                    <td> {{ $laporan->kebun->lokasi }} </td>

                    {{-- Tanggal Laporan --}}
                    <td>{{ $laporan->tanggal_laporan->format('Y-m-d') }}</td>

                    {{-- Bukti Laporan --}}
                    <td class="d-flex items-center gap-2">
                      <a href="{{ route('admin.laporan.view_pdf', $laporan->id) }}">
                        <button type="button"
                          class="btn btn-md d-flex gap-1 justify-content-between align-items-center btn-soft-blue">
                          <iconify-icon icon="lsicon:report-filled"
                            class="align-middle fs-18"></iconify-icon>
                          Lihat
                        </button>
                      </a>

                      <a href="{{ route('admin.laporan.download_pdf', $laporan->id) }}"
                        target="_blank">
                        <button type="button"
                          class="btn btn-md d-flex gap-1 justify-content-between align-items-center btn-soft-success">
                          <iconify-icon icon="material-symbols:download"
                            class="align-middle fs-18"></iconify-icon>
                          Download
                        </button>
                      </a>
                    </td>

                    {{-- Button Aksi --}}
                    <td>
                      <div class="d-flex gap-2">
                        <a href="{{ route('admin.laporan.edit', [$laporan->id]) }}"
                          class="btn btn-soft-primary btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" data-bs-title="Edit Data">
                          <iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18">
                          </iconify-icon>
                        </a>
                        <button type="button" class="btn btn-soft-danger btn-sm"
                          data-bs-toggle="modal" data-bs-target="#hapusDataModal">
                          <iconify-icon icon="solar:trash-bin-minimalistic-2-broken"
                            class="align-middle fs-18">
                          </iconify-icon>
                        </button>
                      </div>
                    </td>

                    {{-- Modal Hapus Data Start --}}
                    <div class="modal fade" id="hapusDataModal" tabindex="-1"
                      aria-labelledby="hapusDataModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          {{-- Modal Body Start --}}
                          <div class="modal-body">
                            <form action="{{ route('admin.laporan.destroy', $laporan->id) }}"
                              method="POST">
                              @csrf
                              @method('DELETE')

                              <div class="text-center">
                                <img src="/images/delete.png" alt="Not Found Img"
                                  class="w-100 h-100">
                                <h4 class="fw-bold">Hapus Data Laporan</h4>
                                <p class="text-muted">
                                  Anda yakin ingin menghapus data laporan ini?
                                </p>
                              </div>

                              {{-- Button Submit --}}
                              <div class="w-100 d-flex gap-2 justify-content-center mt-3">
                                <button type="button" class="btn btn-secondary w-100 py-2"
                                  data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary w-100 py-2">Hapus
                                  Data</button>
                              </div>
                            </form>
                          </div>
                          {{-- Modal Body End --}}
                        </div>
                      </div>
                    </div>

                    {{-- Modal Hapus Data End --}}
                  </tr>
                @endforeach
              @endif
            </tbody>
            {{-- Table Body End --}}
          </table>
        </div>
        {{-- Table End --}}

        {{-- Pagination Start --}}
        <div class="card-footer border-top">
          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-lg-end justify-content-center mb-0">
              {{-- Navigation ke halaman sebelumnya --}}
              @if ($pagination->currentPage() > 1)
                <li class="page-item">
                  <a class="page-link" href="{{ $pagination->previousPageUrl() }}">Previous</a>
                </li>
              @else
                <li class="page-item disabled">
                  <a class="page-link" href="#">Previous</a>
                </li>
              @endif

              {{-- Looping link halaman --}}
              @foreach (range(1, $pagination->lastPage()) as $page)
                <li class="page-item {{ $pagination->currentPage() == $page ? 'active' : '' }}">
                  <a class="page-link"
                    href="{{ $pagination->url($page) }}">{{ $page }}</a>
                </li>
              @endforeach

              {{-- Link ke halaman berikutnya --}}
              @if ($pagination->hasMorePages())
                <li class="page-item">
                  <a class="page-link" href="{{ $pagination->nextPageUrl() }}">Next</a>
                </li>
              @else
                <li class="page-item disabled">
                  <a class="page-link" href="#">Next</a>
                </li>
              @endif
            </ul>
          </nav>
        </div>
        {{-- Pagination End --}}
      </div>
    </div>
  </div>
@endsection
