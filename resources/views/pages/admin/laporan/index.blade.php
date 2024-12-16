@extends('layouts.vertical', ['title' => 'Laporan'])

@section('css')
  @vite(['node_modules/choices.js/public/assets/styles/choices.min.css'])
@endsection

@section('content')
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header d-lg-flex justify-content-between align-items-center gap-1">
          <h4 class="card-title flex-grow-1">Daftar Laporan Kebun</h4>
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

        {{-- Table End --}}

        {{-- Pagination Start --}}

        {{-- Pagination End --}}
      </div>
    </div>
  </div>
@endsection
