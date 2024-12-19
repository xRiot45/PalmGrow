@extends('layouts.admin/app', ['title' => 'Produksi'])

@section('css')
  @vite(['node_modules/choices.js/public/assets/styles/choices.min.css'])
@endsection


@section('content')
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header d-lg-flex justify-content-between align-items-center gap-1">
          <h4 class="card-title flex-grow-1">Daftar Produksi</h4>
          <div class="d-flex flex-wrap  gap-1 mt-lg-0 mt-3">
            {{-- Button Tambah Produksi --}}
            <a href="{{ route('admin.produksi.create') }}" class="btn btn-md btn-primary">
              <iconify-icon icon="ic:baseline-plus" class="align-middle fs-18">
              </iconify-icon>
              Tambah Produksi
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
            <a href="{{ route('admin.produksi.index') }}" class="btn btn-md btn-secondary">
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
                    <h5 class="modal-title" id="filterModalLabel">Filter Data Produksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                      aria-label="Close"></button>
                  </div>

                  {{-- Modal Body Start --}}
                  <div class="modal-body">
                    <form action="{{ route('admin.produksi.index') }}" method="POST">
                      @csrf
                      @method('GET')
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

                      {{-- Luas Kebun --}}
                      <div class="d-flex gap-2">
                        <div class="mb-3 w-100">
                          <label class="form-label" for="luas_kebun_mulai">
                            Luas Kebun Mulai
                          </label>
                          <input type="number" id="luas_kebun_mulai" class="form-control"
                            name="luas_kebun_mulai" placeholder="Masukkan Luas Kebun Mulai"
                            value="{{ request()->get('luas_kebun_mulai') }}">
                        </div>
                        <div class="mb-3 w-100">
                          <label class="form-label" for="luas_kebun_selesai">
                            Luas Kebun Selesai
                          </label>
                          <input type="number" id="luas_kebun_selesai" class="form-control"
                            name="luas_kebun_selesai" placeholder="Masukkan Luas Kebun Selesai"
                            value="{{ request()->get('luas_kebun_selesai') }}">
                        </div>
                      </div>


                      {{-- Jumlah Tandan --}}
                      <div class="d-flex gap-2">
                        <div class="mb-3 w-100">
                          <label class="form-label" for="jumlah_tandan_mulai">
                            Jumlah Tandan Mulai
                          </label>
                          <input type="number" id="jumlah_tandan_mulai" class="form-control"
                            name="jumlah_tandan_mulai" placeholder="Masukkan Jumlah Tandan Mulai"
                            value="{{ request()->get('jumlah_tandan_mulai') }}">
                        </div>
                        <div class="mb-3 w-100">
                          <label class="form-label" for="jumlah_tandan_selesai">
                            Jumlah Tandan Selesai
                          </label>
                          <input type="number" id="jumlah_tandan_selesai" class="form-control"
                            name="jumlah_tandan_selesai" placeholder="Masukkan Jumlah Tandan Selesai"
                            value="{{ request()->get('jumlah_tandan_selesai') }}">
                        </div>
                      </div>

                      {{-- Berat Total --}}
                      <div class="d-flex gap-2">
                        <div class="mb-3 w-100">
                          <label class="form-label" for="berat_total_mulai">
                            Berat Total Mulai
                          </label>
                          <input type="number" id="berat_total_mulai" class="form-control"
                            name="berat_total_mulai" placeholder="Masukkan Berat Total Mulai"
                            value="{{ request()->get('berat_total_mulai') }}">
                        </div>
                        <div class="mb-3 w-100">
                          <label class="form-label" for="berat_total_selesai">
                            Berat Total Selesai
                          </label>
                          <input type="number" id="berat_total_selesai" class="form-control"
                            name="berat_total_selesai" placeholder="Masukkan Berat Total Selesai"
                            value="{{ request()->get('berat_total_selesai') }}">
                        </div>
                      </div>

                      {{-- Tanggal Produksi --}}
                      <div class="d-flex gap-2">
                        <div class="mb-3 w-100">
                          <label class="form-label" for="tanggal_produksi_mulai">
                            Tanggal Produksi Mulai
                          </label>
                          <input type="date" id="tanggal_produksi_mulai" class="form-control"
                            placeholder="-- Pilih Tanggal --" name="tanggal_produksi_mulai"
                            value="{{ request()->get('tanggal_produksi_mulai') }}">
                        </div>
                        <div class="mb-3 w-100">
                          <label class="form-label" for="tanggal_produksi_selesai">
                            Tanggal Produksi Selesai
                          </label>
                          <input type="date" id="tanggal_produksi_selesai" class="form-control"
                            placeholder="-- Pilih Tanggal --" name="tanggal_produksi_selesai"
                            value="{{ request()->get('tanggal_produksi_selesai') }}">
                        </div>
                      </div>


                      {{-- Button Submit --}}
                      <div class="w-100 d-flex gap-1 justify-content-end">
                        <button type="button" class="btn btn-secondary"
                          data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Cari Data Produksi</button>
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
                <th>Luas Kebun</th>
                <th>Jumlah Tandan</th>
                <th>Berat Total</th>
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
                @foreach ($data as $index => $produksi)
                  <tr>
                    {{-- No --}}
                    <td class="px-4">
                      {{ $loop->iteration + ($pagination->currentPage() - 1) * $pagination->perPage() }}
                    </td>

                    {{-- Lokasi Kebun --}}
                    <td> {{ $produksi->kebun->lokasi }} </td>

                    {{-- Luas Kebun --}}
                    <td>{{ number_format($produksi->kebun->luas, 2) }} m<sup>2</sup></td>

                    {{-- Jumlah Tandan --}}
                    <td> {{ $produksi->jumlah_tandan }} </td>

                    {{-- Berat Total --}}
                    <td> {{ $produksi->berat_total }} </td>

                    {{-- Tanggal Produksi --}}
                    <td>{{ $produksi->tanggal_produksi->format('Y-m-d') }}</td>


                    {{-- Button Aksi --}}
                    <td>
                      <div class="d-flex gap-2">
                        <a href="{{ route('admin.produksi.edit', [$produksi->id]) }}"
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
                            <form action="{{ route('admin.produksi.destroy', $produksi->id) }}"
                              method="POST">
                              @csrf
                              @method('DELETE')

                              <div class="text-center">
                                <img src="/images/delete.png" alt="Not Found Img"
                                  class="w-100 h-100">
                                <h4 class="fw-bold">Hapus Data Produksi</h4>
                                <p class="text-muted">
                                  Anda yakin ingin menghapus data produksi ini?
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
