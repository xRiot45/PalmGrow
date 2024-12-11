@extends('layouts.vertical', ['title' => 'Purchase Order'])

@section('content')

<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h4 class="card-title mb-2 d-flex align-items-center gap-2">Total Orders </h4>
                        <p class="text-muted fw-medium fs-22 mb-0">472 <span class="badge text-danger bg-danger-subtle fs-12"><i class="bx bx-down-arrow-alt"></i>6.9%</span> <span class="fs-12">(Last Week)</span></p>
                    </div>
                    <div>
                        <div class="avatar-md bg-primary bg-opacity-10 rounded">
                            <iconify-icon icon="solar:box-broken" class="fs-32 text-primary avatar-title"></iconify-icon>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h4 class="card-title mb-2 d-flex align-items-center gap-2">Order Items Over Time</h4>
                        <p class="text-muted fw-medium fs-22 mb-0">231 <span class="badge text-success bg-success-subtle fs-12"><i class="bx bx-up-arrow-alt"></i>13.2%</span> <span class="fs-12">(Last Week)</span></p>
                    </div>
                    <div>
                        <div class="avatar-md bg-primary bg-opacity-10 rounded">
                            <iconify-icon icon="solar:sort-by-time-broken" class="fs-32 text-primary avatar-title"></iconify-icon>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h4 class="card-title mb-2 d-flex align-items-center gap-2">Return Order</h4>
                        <p class="text-muted fw-medium fs-22 mb-0">367 <span class="badge text-success bg-success-subtle fs-12"><i class="bx bx-up-arrow-alt"></i>2.1%</span> <span class="fs-12">(Last Week)</span></p>
                    </div>
                    <div>
                        <div class="avatar-md bg-primary bg-opacity-10 rounded">
                            <iconify-icon icon="solar:bag-cross-broken" class="fs-32 text-primary avatar-title"></iconify-icon>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h4 class="card-title mb-2 d-flex align-items-center gap-2">Fulfilled Orders Over Time</h4>
                        <p class="text-muted fw-medium fs-22 mb-0">123 <span class="badge text-danger bg-danger-subtle fs-12"><i class="bx bx-down-arrow-alt"></i>3.1%</span> <span class="fs-12">(Last Week)</span></p>
                    </div>
                    <div>
                        <div class="avatar-md bg-primary bg-opacity-10 rounded">
                            <iconify-icon icon="solar:bag-smile-broken" class="fs-32 text-primary avatar-title"></iconify-icon>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="d-flex card-header justify-content-between align-items-center">
                <div>
                    <h4 class="card-title">All Order Items</h4>
                </div>
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle btn btn-sm btn-outline-light rounded" data-bs-toggle="dropdown" aria-expanded="false">
                        This Month
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a href="#!" class="dropdown-item">Download</a>
                        <!-- item-->
                        <a href="#!" class="dropdown-item">Export</a>
                        <!-- item-->
                        <a href="#!" class="dropdown-item">Import</a>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table align-middle mb-0 table-hover table-centered">
                        <thead class="bg-light-subtle">
                            <tr>
                                <th>Customer Name</th>
                                <th>Email</th>
                                <th>Order Date</th>
                                <th>Total</th>
                                <th>Order Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Michael A. Miner</td>
                                <td> michaelminer@dayrep.com</td>
                                <td> 07 Jan, 2023</td>
                                <td>$289.00</td>
                                <td><span class="badge bg-success-subtle text-success py-1 px-2">Completed</span></td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="#!" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a>
                                        <a href="#!" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                        <a href="#!" class="btn btn-soft-danger btn-sm"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>Theresa T. Brose</td>
                                <td>theresbrosea@dayrep.com</td>
                                <td> 03 Dec, 2023</td>
                                <td>$213.00</td>
                                <td><span class="badge bg-danger-subtle text-danger py-1 px-2">Cancel</span></td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="#!" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a>
                                        <a href="#!" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                        <a href="#!" class="btn btn-soft-danger btn-sm"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>James L. Erickson</td>
                                <td>walterlcalabre@jourrapide.com</td>
                                <td> 28 Sep, 2023 </td>
                                <td>$735.00</td>
                                <td><span class="badge bg-success-subtle text-success py-1 px-2">Completed</span></td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="#!" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a>
                                        <a href="#!" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                        <a href="#!" class="btn btn-soft-danger btn-sm"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Lily W. Wilson</td>
                                <td> olivehmize@rhyta.com</td>
                                <td>10 Aug, 2023</td>
                                <td>$324.00</td>
                                <td><span class="badge bg-warning-subtle text-warning py-1 px-2">Pending</span></td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="#!" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a>
                                        <a href="#!" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                        <a href="#!" class="btn btn-soft-danger btn-sm"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Sarah M. Brooks</td>
                                <td>christasardina@dayrep.com</td>
                                <td> 22 May, 2023 </td>
                                <td>$153.00</td>
                                <td><span class="badge bg-success-subtle text-success py-1 px-2">Completed</span></td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="#!" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a>
                                        <a href="#!" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                        <a href="#!" class="btn btn-soft-danger btn-sm"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Joe K. Hall</td>
                                <td>darrenwrivera@dayrep.com</td>
                                <td>15 Mar, 2023</td>
                                <td>$424.00</td>
                                <td><span class="badge bg-danger-subtle text-danger py-1 px-2">Cancel</span></td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="#!" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a>
                                        <a href="#!" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                        <a href="#!" class="btn btn-soft-danger btn-sm"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Ralph Hueber</td>
                                <td> robertvleavitt@dayrep.com</td>
                                <td>19 Dec, 2023</td>
                                <td>$521.00</td>
                                <td><span class="badge bg-warning-subtle text-warning py-1 px-2">Pending</span></td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="#!" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a>
                                        <a href="#!" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                        <a href="#!" class="btn btn-soft-danger btn-sm"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Sarah Drescher</td>
                                <td>lydiajanderson@dayrep.com</td>
                                <td>11 Jun, 2023</td>
                                <td>$313.00</td>
                                <td><span class="badge bg-success-subtle text-success py-1 px-2">Completed</span></td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="#!" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a>
                                        <a href="#!" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                        <a href="#!" class="btn btn-soft-danger btn-sm"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Leonie Meister</td>
                                <td>leonie@dayrep.com</td>
                                <td>19 Mar, 2023 </td>
                                <td>$219.00</td>
                                <td><span class="badge bg-danger-subtle text-danger py-1 px-2">Cancel</span></td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="#!" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a>
                                        <a href="#!" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                        <a href="#!" class="btn btn-soft-danger btn-sm"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->
            </div>
            <div class="card-footer border-top">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end mb-0">
                        <li class="page-item"><a class="page-link" href="javascript:void(0);">Previous</a></li>
                        <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0);">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

</div>

@endsection