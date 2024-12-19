@extends('layouts.admin/app', ['title' => 'Pembayaran'])

@section('css')
  @vite(['node_modules/choices.js/public/assets/styles/choices.min.css'])
@endsection


@section('content')
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header d-lg-flex justify-content-between align-items-center gap-1">
          <h4 class="card-title flex-grow-1">Daftar Pembayaran</h4>
          <div class="d-flex flex-wrap  gap-1 mt-lg-0 mt-3">
            {{-- Button Tambah Pembayaran --}}
            <a href="{{ route('admin.pembayaran.create') }}" class="btn btn-md btn-primary">
              <iconify-icon icon="ic:baseline-plus" class="align-middle fs-18">
              </iconify-icon>
              Tambah Pembayaran
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
            <a href="{{ route('admin.pembayaran.index') }}" class="btn btn-md btn-secondary">
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
                    <h5 class="modal-title" id="filterModalLabel">Filter Data Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                      aria-label="Close"></button>
                  </div>

                  {{-- Modal Body Start --}}
                  <div class="modal-body">
                    <form action="{{ route('admin.pembayaran.index') }}" method="GET">
                      {{-- Lokasi Produksi Kebun --}}
                      <div class="mb-3">
                        <label class="form-label" for="lokasi_produksi_kebun">
                          Lokasi Produksi
                        </label>
                        <select name="lokasi_produksi_kebun" id="lokasi_produksi_kebun"
                          class="form-control" aria-label="Pilih Lokasi Kebun Produksi" data-choices
                          data-choices-search-true data-choices-removeItem>
                          <option value="">-- Pilih Lokasi Kebun Produksi --</option>
                          @foreach ($lokasi_produksi_kebun as $lokasi)
                            <option value="{{ $lokasi->kebun->lokasi }}">{{ $lokasi->kebun->lokasi }}
                            </option>
                          @endforeach
                        </select>
                      </div>

                      {{-- Metode Pembayaran --}}
                      <div class="mb-3">
                        <label class="form-label" for="metode_pembayaran">Metode Pembayaran</label>
                        <select name="metode_pembayaran" id="metode_pembayaran" class="form-control"
                          aria-label="Pilih Metode Pembayaran" data-choices data-choices-search-true
                          data-choices-removeItem>
                          <option value="">-- Pilih Metode Pembayaran --</option>
                          <option value="Cash">Cash</option>
                          <option value="Transfer">Transfer</option>
                        </select>
                      </div>

                      {{-- Jumlah Pembayaran --}}
                      <div class="row">
                        <div class="mb-3 col-md-6">
                          <label class="form-label" for="jumlah_pembayaran_mulai">
                            Jumlah Pembayaran Mulai
                          </label>
                          <input type="number" id="jumlah_pembayaran_mulai"
                            name="jumlah_pembayaran_mulai" class="form-control "
                            placeholder="Masukkan jumlah pembayaran mulai">
                          @error('jumlah_pembayaran_mulai')
                            <span class="text-danger error-message">{{ $message }}</span>
                          @enderror
                        </div>

                        <div class="mb-3 col-md-6">
                          <label class="form-label" for="jumlah_pembayaran_selesai">
                            Jumlah Pembayaran Selesai
                          </label>
                          <input type="number" id="jumlah_pembayaran_selesai"
                            name="jumlah_pembayaran_selesai" class="form-control "
                            placeholder="Masukkan jumlah pembayaran mulai">
                          @error('jumlah_pembayaran_selesai')
                            <span class="text-danger error-message">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>

                      {{-- Tanggal Pembayaran --}}
                      <div class="row">
                        <div class="mb-3 col-md-6">
                          <label class="form-label" for="tanggal_pembayaran_mulai">
                            Tanggal Pembayaran Mulai
                          </label>
                          <input type="date" id="tanggal_pembayaran_mulai" class="form-control"
                            placeholder="-- Pilih Tanggal --" name="tanggal_pembayaran_mulai"
                            value="{{ request()->get('tanggal_pembayaran_mulai') }}">
                        </div>
                        <div class="mb-3 col-md-6">
                          <label class="form-label" for="tanggal_laporan_selesai">
                            Tanggal Pembayaran Selesai
                          </label>
                          <input type="date" id="tanggal_pembayaran_selesai" class="form-control"
                            placeholder="-- Pilih Tanggal --" name="tanggal_pembayaran_selesai"
                            value="{{ request()->get('tanggal_pembayaran_selesai') }}">
                        </div>
                      </div>

                      {{-- Button Submit --}}
                      <div class="w-100 d-flex gap-1 justify-content-end">
                        <button type="button" class="btn btn-secondary"
                          data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Cari Pembayaran</button>
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
                <th>Lokasi Produksi</th>
                <th>Jumlah Pembayaran</th>
                <th>Tanggal Pembayaran</th>
                <th>Jumlah Tandan</th>
                <th>Berat Total</th>
                <th>Metode Pembayaran</th>
                <th>Bukti Pembayaran</th>
                <th>Aksi</th>
              </tr>
            </thead>
            {{-- Table Head End --}}

            {{-- Table Body Start --}}
            <tbody>
              @if (empty($data))
                <tr>
                  <td colspan="9" class="text-center">
                    <img src="/images/404-error.png" alt="Not Found Img" class="w-25 h-25">
                    <h4 class="fw-bold">Data Tidak Ditemukan</h4>
                  </td>
                </tr>
              @else
                @foreach ($data as $index => $pembayaran)
                  <tr>
                    {{-- No --}}
                    <td class="px-4">
                      {{ $loop->iteration + ($pagination->currentPage() - 1) * $pagination->perPage() }}
                    </td>

                    {{-- Lokasi Produksi --}}
                    <td> {{ $pembayaran->produksi->kebun->lokasi }} </td>

                    {{-- Jumlah Pembayaran --}}
                    <td>{{ 'Rp ' . number_format($pembayaran->jumlah_pembayaran, 0, ',', '.') }}</td>

                    {{-- Tanggal Pembayaran --}}
                    <td>{{ $pembayaran->tanggal_pembayaran->format('Y-m-d') }}</td>

                    {{-- Jumlah Tandan --}}
                    <td>{{ $pembayaran->produksi->jumlah_tandan }}</td>

                    {{-- Berat Total --}}
                    <td>{{ $pembayaran->produksi->berat_total }}</td>


                    {{-- Metode Pembayaran --}}
                    <td>
                      @if ($pembayaran->metode_pembayaran === 'Cash')
                        <span class="badge bg-blue">Cash</span>
                      @elseif ($pembayaran->metode_pembayaran === 'Transfer')
                        <span class="badge bg-success">Transfer</span>
                      @else
                        <span class="badge bg-secondary">Metode Pembayaran Tidak Dikenal</span>
                      @endif
                    </td>

                    {{-- Bukti Pembayaran --}}
                    <td class="d-flex items-center gap-2">
                      <button type="button"
                        class="btn btn-md d-flex gap-1 justify-content-between align-items-center btn-soft-blue"
                        data-bs-toggle="modal" data-bs-target="#modalBuktiPembayaran">
                        <iconify-icon icon="lsicon:report-filled"
                          class="align-middle fs-18"></iconify-icon>
                        Lihat
                      </button>

                      <a href="{{ route('admin.pembayaran.download_file', $pembayaran->id) }}"
                        target="_blank">
                        <button type="button"
                          class="btn btn-md d-flex gap-1 justify-content-between align-items-center btn-soft-success">
                          <iconify-icon icon="material-symbols:download"
                            class="align-middle fs-18"></iconify-icon>
                          Unduh
                        </button>
                      </a>
                    </td>

                    {{-- Button Aksi --}}
                    <td>
                      <div class="d-flex gap-2">
                        <a href="{{ route('admin.pembayaran.edit', [$pembayaran->id]) }}"
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
                            <form action="{{ route('admin.pembayaran.destroy', $pembayaran->id) }}"
                              method="POST">
                              @csrf
                              @method('DELETE')

                              <div class="text-center">
                                <img src="/images/delete.png" alt="Not Found Img"
                                  class="w-100 h-100">
                                <h4 class="fw-bold">Hapus Data Pembayaran</h4>
                                <p class="text-muted">
                                  Anda yakin ingin menghapus data pembayaran ini?
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

                    {{-- Modal Bukti Pembayaran Start --}}
                    <div class="modal fade" id="modalBuktiPembayaran" tabindex="-1"
                      aria-labelledby="modalBuktiPembayaran" aria-hidden="true">
                      <div class="modal-dialog ">
                        <div class="modal-content">
                          {{-- Modal Body Start --}}
                          <div class="modal-body">
                            <div class="text-center">
                              <img
                                src="{{ $pembayaran->bukti_pembayaran ? asset('storage/pembayaran/' . basename($pembayaran->bukti_pembayaran)) : asset('images/404-error.png') }}"
                                alt="Not Found Img" class="w-100 h-100">
                            </div>

                            <div class="w-100 d-flex gap-2 justify-content-center mt-3">
                              <button type="button" class="btn btn-secondary w-100 py-2"
                                data-bs-dismiss="modal">
                                Tutup
                              </button>
                              <a class="w-100"
                                href="{{ route('admin.pembayaran.download_file', $pembayaran->id) }}">
                                <button type="button" class="btn w-100 py-2 btn-success">
                                  Unduh
                                </button>
                              </a>
                            </div>
                          </div>
                          {{-- Modal Body End --}}
                        </div>
                      </div>
                    </div>
                    {{-- Modal Bukti Pembayaran End --}}
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
