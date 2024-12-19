@extends('layouts.admin/app', ['title' => 'Petugas'])

@section('css')
  @vite(['node_modules/choices.js/public/assets/styles/choices.min.css'])
@endsection


@section('content')
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header d-md-flex justify-content-between align-items-center gap-1">
          <h4 class="card-title flex-grow-1">Daftar Petugas</h4>
          <div class="d-md-flex flex-wrap gap-1 mt-md-0 mt-3">
            {{-- Button Tambah Petugas --}}
            <a href="{{ route('admin.petugas.create') }}"
              class="btn btn-md btn-primary d-flex justify-content-center align-items-center gap-1 mb-md-0 mb-2">
              <iconify-icon icon="ic:baseline-plus" class="align-middle fs-18">
              </iconify-icon>
              Tambah Petugas
            </a>

            {{-- Button Modal Filter --}}
            <a class="btn btn-md d-flex gap-1 justify-content-center align-items-center btn-success mb-md-0 mb-2"
              data-bs-toggle="modal" data-bs-target="#filterModal">
              <iconify-icon icon="mage:filter" class="align-middle fs-18">
              </iconify-icon>
              Filter
            </a>

            {{-- Button Refresh Halaman --}}
            <a href="{{ route('admin.petugas.index') }}"
              class="btn btn-md btn-secondary d-flex justify-content-center align-items-center gap-1 mb-md-0 mb-2">
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
                    <h5 class="modal-title" id="filterModalLabel">Filter Data Petugas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                      aria-label="Close"></button>
                  </div>

                  {{-- Modal Body Start --}}
                  <div class="modal-body">
                    <form action="{{ route('admin.petugas.index') }}" method="POST">
                      @csrf
                      @method('GET')
                      {{-- Input Nama Petugas --}}
                      <div class="mb-3">
                        <label class="form-label" for="nama_petugas">Nama Petugas</label>
                        <input type="text" id="nama_petugas" name="nama_petugas"
                          class="form-control" value="{{ request()->get('nama_petugas') }}"
                          placeholder="Masukkan nama petugas">
                      </div>

                      {{-- Input Jabatan --}}
                      <div class="mb-3">
                        <label class="form-label" for="jabatan">Jabatan</label>
                        <input type="text" id="jabatan" name="jabatan" class="form-control"
                          value="{{ request()->get('jabatan') }}" placeholder="Masukkan jabatan">
                      </div>

                      {{-- Tanggal Bergabung --}}
                      <div class="d-flex gap-2">
                        <div class="mb-3 w-100">
                          <label class="form-label" for="tanggal_bergabung_mulai">
                            Tanggal Bergabung Mulai
                          </label>
                          <input type="date" id="tanggal_bergabung_mulai" class="form-control"
                            placeholder="-- Pilih Tanggal --" name="tanggal_bergabung_mulai"
                            value="{{ request()->get('tanggal_bergabung_mulai') }}">
                        </div>
                        <div class="mb-3 w-100">
                          <label class="form-label" for="tanggal_bergabung_selesai">
                            Tanggal Bergabung Selesai
                          </label>
                          <input type="date" id="tanggal_bergabung_selesai" class="form-control"
                            placeholder="-- Pilih Tanggal --" name="tanggal_bergabung_selesai"
                            value="{{ request()->get('tanggal_bergabung_selesai') }}">
                        </div>
                      </div>

                      {{-- Button Submit --}}
                      <div class="w-100 d-flex gap-1 justify-content-end">
                        <button type="button" class="btn btn-secondary"
                          data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Cari Petugas</button>
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
                <th>Email</th>
                <th>Nama Petugas</th>
                <th>Jabatan</th>
                <th>Tanggal Bergabung</th>
                <th>Role</th>
                <th>Aksi</th>
              </tr>
            </thead>
            {{-- Table Head End --}}

            {{-- Table Body Start --}}
            <tbody>
              @if (empty($data))
                <tr>
                  <td colspan="7" class="text-center">
                    <img src="/images/404-error.png" alt="Not Found Img" class="w-25 h-25">
                    <h4 class="fw-bold">Data Tidak Ditemukan</h4>
                  </td>
                </tr>
              @else
                @foreach ($data as $index => $petugas)
                  <tr>
                    {{-- No --}}
                    <td class="px-4">
                      {{ $loop->iteration + ($pagination->currentPage() - 1) * $pagination->perPage() }}
                    </td>

                    {{-- Email --}}
                    <td>{{ $petugas->pengguna->email }}</td>

                    {{-- Nama Petugas --}}
                    <td> {{ $petugas->nama_petugas }} </td>

                    {{-- Jabatan --}}
                    <td> {{ $petugas->jabatan }} </td>

                    {{-- Tanggal Bergabung --}}
                    <td> {{ $petugas->tanggal_bergabung->format('Y-m-d') }} </td>

                    {{-- Role --}}
                    <td>
                      @if ($petugas->pengguna->role->value === 'Admin')
                        <span class="badge bg-primary">Admin</span>
                      @elseif ($petugas->pengguna->role->value === 'Petugas Kebun')
                        <span class="badge bg-info">Petugas Kebun</span>
                      @elseif ($petugas->pengguna->role->value === 'Manajer')
                        <span class="badge bg-danger">Manajer</span>
                      @else
                        <span class="badge bg-secondary">Role Tidak Dikenal</span>
                      @endif
                    </td>


                    {{-- Button Aksi --}}
                    <td>
                      <div class="d-flex gap-2">
                        <a href="{{ route('admin.petugas.edit', [$petugas->id]) }}"
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
                            <form action="{{ route('admin.petugas.destroy', $petugas->id) }}"
                              method="POST">
                              @csrf
                              @method('DELETE')

                              <div class="text-center">
                                <img src="/images/delete.png" alt="Not Found Img"
                                  class="w-100 h-100">
                                <h4 class="fw-bold">Hapus Data Petugas</h4>
                                <p class="text-muted">
                                  Anda yakin ingin menghapus data petugas ini?
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
          <nav aria-label="Page navigation example"
            class="d-lg-flex justify-content-lg-between align-items-center text-center">
            <div class="d-flex flex-wrap gap-2 justify-content-center mb-lg-0 mb-3">
              <form action="{{ route('admin.kebun.index') }}" method="POST"
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
  </div>
@endsection
