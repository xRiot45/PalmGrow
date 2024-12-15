@extends('layouts.vertical', ['title' => 'Distribusi'])

@section('css')
  @vite(['node_modules/choices.js/public/assets/styles/choices.min.css'])
@endsection


@section('content')
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header d-lg-flex justify-content-between align-items-center gap-1">
          <h4 class="card-title flex-grow-1">Daftar Distribusi</h4>
          <div class="d-flex flex-wrap  gap-1 mt-lg-0 mt-3">
            {{-- Button Tambah Distribusi --}}
            <a href="{{ route('admin.distribusi.create') }}" class="btn btn-md btn-primary">
              <iconify-icon icon="ic:baseline-plus" class="align-middle fs-18">
              </iconify-icon>
              Tambah Distribusi
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
            <a href="{{ route('admin.distribusi.index') }}" class="btn btn-md btn-secondary">
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
                    <h5 class="modal-title" id="filterModalLabel">Filter Data Distribusi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                      aria-label="Close"></button>
                  </div>

                  {{-- Modal Body Start --}}
                  <div class="modal-body">
                    <form action="{{ route('admin.distribusi.index') }}" method="GET">

                      {{-- Tujuan Distribusi --}}
                      <div class="mb-3">
                        <label class="form-label" for="tujuan_distribusi">Tujuan Distribusi</label>
                        <input type="text" id="tujuan_distribusi" name="tujuan_distribusi"
                          class="form-control" value="{{ request()->get('tujuan_distribusi') }}"
                          placeholder="Masukkan tujuan distribusi">
                      </div>

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

                      {{-- Jumlah Distribusi --}}
                      <div class="d-flex gap-2">
                        <div class="mb-3 w-100">
                          <label class="form-label" for="jumlah_distribusi_mulai">
                            Jumlah Distribusi Mulai
                          </label>
                          <input type="number" id="jumlah_distribusi_mulai" class="form-control"
                            name="jumlah_distribusi_mulai"
                            placeholder="Masukkan Jumlah Distribusi Mulai"
                            value="{{ request()->get('jumlah_distribusi_mulai') }}">
                        </div>
                        <div class="mb-3 w-100">
                          <label class="form-label" for="jumlah_distribusi_selesai">
                            Jumlah Distribusi Selesai
                          </label>
                          <input type="number" id="jumlah_distribusi_selesai" class="form-control"
                            name="jumlah_distribusi_selesai"
                            placeholder="Masukkan Jumlah Distribusi Selesai"
                            value="{{ request()->get('jumlah_distribusi_selesai') }}">
                        </div>
                      </div>

                      {{-- Tanggal Distribusi --}}
                      <div class="d-flex gap-2">
                        <div class="mb-3 w-100">
                          <label class="form-label" for="tanggal_distribusi_mulai">
                            Tanggal Distribusi Mulai
                          </label>
                          <input type="date" id="tanggal_distribusi_mulai" class="form-control"
                            placeholder="-- Pilih Tanggal --" name="tanggal_distribusi_mulai"
                            value="{{ request()->get('tanggal_distribusi_mulai') }}">
                        </div>
                        <div class="mb-3 w-100">
                          <label class="form-label" for="tanggal_distribusi_mulai">
                            Tanggal Distribusi Selesai
                          </label>
                          <input type="date" id="tanggal_distribusi_mulai" class="form-control"
                            placeholder="-- Pilih Tanggal --" name="tanggal_distribusi_mulai"
                            value="{{ request()->get('tanggal_distribusi_mulai') }}">
                        </div>
                      </div>


                      {{-- Button Submit --}}
                      <div class="w-100 d-flex gap-1 justify-content-end">
                        <button type="button" class="btn btn-secondary"
                          data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Cari Data Distribusi</button>
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
                <th>Tujuan Distribusi</th>
                <th>Jumlah Distribusi</th>
                <th>Tanggal Distribusi</th>
                <th>Lokasi Kebun</th>
                <th>Tanggal Produksi</th>
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
                @foreach ($data as $index => $distribusi)
                  <tr>
                    {{-- No --}}
                    <td class="px-4">
                      {{ $loop->iteration + ($pagination->currentPage() - 1) * $pagination->perPage() }}
                    </td>

                    {{-- Tujuan Distribusi --}}
                    <td> {{ $distribusi->tujuan }} </td>

                    {{-- Jumlah Distribusi --}}
                    <td> {{ $distribusi->jumlah }} </td>

                    {{-- Tanggal Distribusi --}}
                    <td>{{ $distribusi->tanggal_distribusi->format('Y-m-d') }}</td>

                    {{-- Lokasi Kebun --}}
                    <td> {{ $distribusi->produksi->kebun->lokasi }} </td>

                    {{-- Tanggal Produksi --}}
                    <td>{{ $distribusi->produksi->tanggal_produksi->format('Y-m-d') }}</td>


                    {{-- Button Aksi --}}
                    <td>
                      <div class="d-flex gap-2">
                        <a href="{{ route('admin.distribusi.edit', [$distribusi->id]) }}"
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
                            <form action="{{ route('admin.distribusi.destroy', $distribusi->id) }}"
                              method="POST">
                              @csrf
                              @method('DELETE')

                              <div class="text-center">
                                <img src="/images/delete.png" alt="Not Found Img"
                                  class="w-100 h-100">
                                <h4 class="fw-bold">Hapus Data Distribusi</h4>
                                <p class="text-muted">
                                  Anda yakin ingin menghapus data distribusi ini?
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
