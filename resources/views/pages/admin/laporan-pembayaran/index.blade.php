@extends('layouts.admin/app', ['title' => 'Laporan Pembayaran'])


@section('content')
  <div>
    <form action="{{ route('admin.laporan-pembayaran.index') }}" method="POST" class="card p-3">
      @csrf
      @method('GET')
      {{-- Lokasi Produksi Kebun --}}
      <div class="mb-3">
        <label class="form-label" for="lokasi_produksi_kebun">
          Lokasi Produksi
        </label>
        <select name="lokasi_produksi_kebun" id="lokasi_produksi_kebun" class="form-control"
          aria-label="Pilih Lokasi Kebun Produksi" data-choices data-choices-search-true
          data-choices-removeItem>
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
          <input type="number" id="jumlah_pembayaran_mulai" name="jumlah_pembayaran_mulai"
            class="form-control " placeholder="Masukkan jumlah pembayaran mulai">
          @error('jumlah_pembayaran_mulai')
            <span class="text-danger error-message">{{ $message }}</span>
          @enderror
        </div>

        <div class="mb-3 col-md-6">
          <label class="form-label" for="jumlah_pembayaran_selesai">
            Jumlah Pembayaran Selesai
          </label>
          <input type="number" id="jumlah_pembayaran_selesai" name="jumlah_pembayaran_selesai"
            class="form-control " placeholder="Masukkan jumlah pembayaran mulai">
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
        <a href="{{ route('admin.laporan-pembayaran.index') }}"
          class="btn btn-md btn-blue d-flex justify-content-center align-items-center gap-1 mb-md-0 mb-2">
          <iconify-icon icon="ic:baseline-refresh" class="align-middle fs-18">
          </iconify-icon>
          Refresh Data
        </a>

        <button type="submit"
          class="btn btn-primary d-flex justify-content-center align-items-center gap-1 mb-md-0 mb-2">
          <iconify-icon icon="bx:search-alt" class="align-middle fs-18">
          </iconify-icon>
          Cari Data Pembayaran
        </button>
      </div>
    </form>

    <div class="card">
      <div class="card-header d-lg-flex justify-content-between align-items-center gap-1">
        <h4 class="card-title flex-grow-1">Daftar Pembayaran</h4>
        <div class="d-flex flex-wrap  gap-1 mt-lg-0 mt-3">
          {{-- Export CSV --}}
          <a href="{{ route('admin.laporan-pembayaran.export_csv', request()->all()) }}"
            class="btn btn-md btn-success d-flex justify-content-center align-items-center gap-1 mb-md-0 mb-2">
            <iconify-icon icon="teenyicons:csv-solid" class="align-middle fs-18"></iconify-icon>
            Export CSV
          </a>


          {{-- Export PDF --}}
          <a href="{{ route('admin.laporan-pembayaran.export_pdf', request()->all()) }}"
            class="btn btn-md btn-danger d-flex justify-content-center align-items-center gap-1 mb-md-0 mb-2">
            <iconify-icon icon="mingcute:pdf-fill" class="align-middle fs-18">
            </iconify-icon>
            Export PDF
          </a>
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
            </tr>
          </thead>
          {{-- Table Head End --}}

          {{-- Table Body Start --}}
          <tbody>
            @if (empty($data))
              <tr>
                <td colspan="8" class="text-center">
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
                  <td>{{ $pembayaran->produksi->jumlah_tandan }} Tandan</td>

                  {{-- Berat Total --}}
                  <td>{{ $pembayaran->produksi->berat_total }} Kg</td>


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
        <nav aria-label="Page navigation example"
          class="d-lg-flex justify-content-lg-between align-items-center text-center">
          <div class="d-flex flex-wrap gap-2 justify-content-center mb-lg-0 mb-3">
            <form action="{{ route('admin.laporan-pembayaran.index') }}" method="POST"
              class="d-flex align-items-center gap-2 justify-content-center flex-wrap">
              @csrf
              @method('GET')
              {{-- Pilihan Rows Per Page --}}
              <label for="rows" class="mb-0">
                Data Per Halaman
              </label>
              <select name="perPage" id="perPage" class="form-select w-auto"
                onchange="this.form.submit()">
                <option value="5" {{ $perPage == 5 ? 'selected' : '' }}>5</option>
                <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                <option value="25" {{ $perPage == 25 ? 'selected' : '' }}>25</option>
                <option value="50" {{ $perPage == 50 ? 'selected' : '' }}>50</option>
                <option value="100" {{ $perPage == 100 ? 'selected' : '' }}>100</option>
              </select>
            </form>
          </div>
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
            @if ($pagination->lastPage() > 5)
              @if ($pagination->currentPage() > 3)
                <li class="page-item">
                  <a class="page-link" href="{{ $pagination->url(1) }}">1</a>
                </li>
                @if ($pagination->currentPage() > 4)
                  <li class="page-item disabled"><span class="page-link">...</span></li>
                @endif
              @endif

              @foreach (range(max(1, $pagination->currentPage() - 2), min($pagination->lastPage(), $pagination->currentPage() + 2)) as $page)
                <li class="page-item {{ $pagination->currentPage() == $page ? 'active' : '' }}">
                  <a class="page-link"
                    href="{{ $pagination->url($page) }}">{{ $page }}</a>
                </li>
              @endforeach

              @if ($pagination->currentPage() < $pagination->lastPage() - 2)
                @if ($pagination->currentPage() < $pagination->lastPage() - 3)
                  <li class="page-item disabled"><span class="page-link">...</span></li>
                @endif
                <li class="page-item">
                  <a class="page-link"
                    href="{{ $pagination->url($pagination->lastPage()) }}">{{ $pagination->lastPage() }}</a>
                </li>
              @endif
            @else
              @foreach (range(1, $pagination->lastPage()) as $page)
                <li class="page-item {{ $pagination->currentPage() == $page ? 'active' : '' }}">
                  <a class="page-link"
                    href="{{ $pagination->url($page) }}">{{ $page }}</a>
                </li>
              @endforeach
            @endif

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
@endsection
