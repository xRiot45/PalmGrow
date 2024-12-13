@extends('layouts.vertical', ['title' => 'Petugas'])

@section('css')
  @vite(['node_modules/choices.js/public/assets/styles/choices.min.css'])
@endsection


@section('content')
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header d-lg-flex justify-content-between align-items-center gap-1">
          <h4 class="card-title flex-grow-1">Daftar Petugas</h4>
          <div class="d-flex flex-wrap  gap-1 mt-lg-0 mt-3">
            {{-- Button Tambah Petugas --}}
            <a href="{{ route('admin.petugas.create') }}" class="btn btn-md btn-primary">
              <iconify-icon icon="ic:baseline-plus" class="align-middle fs-18">
              </iconify-icon>
              Tambah Petugas
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
            <a href="{{ route('admin.petugas.index') }}" class="btn btn-md btn-secondary">
              <iconify-icon icon="ic:baseline-refresh" class="align-middle fs-18">
              </iconify-icon>
              Refresh
            </a>

            {{-- Modal Filter Start --}}
            <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel"
              aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="filterModalLabel">Filter Data Petugas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                      aria-label="Close"></button>
                  </div>

                  {{-- Modal Body Start --}}
                  <div class="modal-body">
                    <form action="{{ route('admin.petugas.index') }}" method="GET">
                      {{-- Input Nama Petugas --}}
                      <div class="mb-3">
                        <label class="form-label" for="name">Nama Petugas</label>
                        <input type="text" id="name" name="name" class="form-control"
                          value="{{ request()->get('name') }}" placeholder="Masukkan nama pengguna">
                      </div>

                      {{-- Input email --}}
                      <div class="mb-3">
                        <label class="form-label" for="email">Email Pengguna</label>
                        <input type="email" id="email" name="email" class="form-control"
                          value="{{ request()->get('email') }}" placeholder="Masukkan email pengguna">
                      </div>

                      {{-- Select Role --}}
                      <div class="mb-3">
                        <label class="form-label" for="role">Role</label>
                        <select name="role" id="role" class="form-control"
                          aria-label="Pilih Role" data-choices data-choices-search-false
                          data-choices-removeItem>
                          <option value="">-- Pilih Role --</option>
                          <option value="Admin"
                            {{ request()->get('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                          <option value="Petugas Kebun"
                            {{ request()->get('role') == 'Petugas Kebun' ? 'selected' : '' }}>Petugas
                            Kebun</option>
                          <option value="Manajer"
                            {{ request()->get('role') == 'Manajer' ? 'selected' : '' }}>Manajer
                          </option>
                        </select>
                      </div>

                      {{-- Button Submit --}}
                      <div class="w-100 d-flex gap-1 justify-content-end">
                        <button type="button" class="btn btn-secondary"
                          data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Cari Pengguna</button>
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
                  <td colspan="5" class="text-center">
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
