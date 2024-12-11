@extends('layouts.vertical', ['title' => 'Customer List'])

@section('content')

<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <div class="avatar-md bg-primary bg-opacity-10 rounded">
                        <iconify-icon icon="solar:users-group-two-rounded-bold-duotone" class="fs-32 text-primary avatar-title"></iconify-icon>
                    </div>
                    <div>
                        <h4 class="mb-0">All Customers</h4>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <p class="text-muted fw-medium fs-22 mb-0">+22.63k</p>
                    <div>
                        <span class="badge text-success bg-success-subtle fs-12"><i class="bx bx-up-arrow-alt"></i>34.4%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <div class="avatar-md bg-primary bg-opacity-10 rounded">
                        <iconify-icon icon="solar:box-bold-duotone" class="fs-32 text-primary avatar-title"></iconify-icon>
                    </div>
                    <div>
                        <h4 class="mb-0">Orders</h4>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <p class="text-muted fw-medium fs-22 mb-0">+4.5k</p>
                    <div>
                        <span class="badge text-danger bg-danger-subtle fs-12"><i class="bx bx-down-arrow-alt"></i>8.1%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <div class="avatar-md bg-primary bg-opacity-10 rounded">
                        <iconify-icon icon="solar:headphones-round-sound-bold-duotone" class="fs-32 text-primary avatar-title"></iconify-icon>
                    </div>
                    <div>
                        <h4 class="mb-0">Services Request</h4>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <p class="text-muted fw-medium fs-22 mb-0">+1.03k</p>
                    <div>
                        <span class="badge text-success bg-success-subtle fs-12"><i class="bx bx-up-arrow-alt"></i>12.6%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <div class="avatar-md bg-primary bg-opacity-10 rounded">
                        <iconify-icon icon="solar:bill-list-bold-duotone" class="fs-32 text-primary avatar-title"></iconify-icon>
                    </div>
                    <div>
                        <h4 class="mb-0">Invoice & Payment</h4>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <p class="text-muted fw-medium fs-22 mb-0">$38,908.00</p>
                    <div>
                        <span class="badge text-success bg-success-subtle fs-12"><i class="bx bx-up-arrow-alt"></i>45.9%</span>
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
                    <h4 class="card-title">All Customers List</h4>
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
            <div>
                <div class="table-responsive">
                    <table class="table align-middle mb-0 table-hover table-centered">
                        <thead class="bg-light-subtle">
                            <tr>
                                <th style="width: 20px;">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck1">
                                        <label class="form-check-label" for="customCheck1"></label>
                                    </div>
                                </th>
                                <th>Customer Name</th>
                                <th>Invoice ID</th>
                                <th>Status</th>
                                <th>Total Amount</th>
                                <th>Amount Due</th>
                                <th>Due Date</th>
                                <th>Payment Method</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck2">
                                        <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                    </div>
                                </td>
                                <td><img src="/images/users/avatar-2.jpg" class="avatar-sm rounded-circle me-2" alt="..."> Michael A. Miner</td>
                                <td><a href="javascript: void(0);" class="text-body">#INV2540</a> </td>
                                <td> <span class="badge bg-success-subtle text-success py-1 px-2">Completed</span> </td>
                                <td> $4,521 </td>
                                <td> $8,901 </td>
                                <td> 07 Jan, 2023</td>
                                <td> Mastercard </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="#!" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a>
                                        <a href="#!" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                        <a href="#!" class="btn btn-soft-danger btn-sm"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck3">
                                        <label class="form-check-label" for="customCheck3">&nbsp;</label>
                                    </div>
                                </td>
                                <td><img src="/images/users/avatar-3.jpg" class="avatar-sm rounded-circle me-2" alt="..."> Theresa T. Brose</td>
                                <td><a href="javascript: void(0);" class="text-body">#INV3924</a> </td>
                                <td> <span class="badge bg-danger-subtle text-danger px-2 py-1">Cancel</span> </td>
                                <td> $7,836 </td>
                                <td> $9,902 </td>
                                <td> 03 Dec, 2023</td>
                                <td> Visa </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="#!" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a>
                                        <a href="#!" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                        <a href="#!" class="btn btn-soft-danger btn-sm"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck4">
                                        <label class="form-check-label" for="customCheck4">&nbsp;</label>
                                    </div>
                                </td>
                                <td><img src="/images/users/avatar-4.jpg" class="avatar-sm rounded-circle me-2" alt="..."> James L. Erickson</td>
                                <td><a href="javascript: void(0);" class="text-body">#INV5032</a> </td>
                                <td>
                                    <span class="badge bg-success-subtle text-success py-1 px-2">Completed</span>
                                </td>
                                <td> $1,347 </td>
                                <td> $6,718 </td>
                                <td> 28 Sep, 2023 </td>
                                <td> Paypal </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="#!" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a>
                                        <a href="#!" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                        <a href="#!" class="btn btn-soft-danger btn-sm"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck5">
                                        <label class="form-check-label" for="customCheck5">&nbsp;</label>
                                    </div>
                                </td>
                                <td><img src="/images/users/avatar-5.jpg" class="avatar-sm rounded-circle me-2" alt="..."> Lily W. Wilson</td>
                                <td><a href="javascript: void(0);" class="text-body">#INV1695</a> </td>
                                <td><span class="badge bg-primary-subtle text-primary py-1 px-2">Pending</span></td>
                                <td> $9,457 </td>
                                <td> $3,928 </td>
                                <td>10 Aug, 2023</td>
                                <td> Mastercard</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="#!" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a>
                                        <a href="#!" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                        <a href="#!" class="btn btn-soft-danger btn-sm"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck6">
                                        <label class="form-check-label" for="customCheck6">&nbsp;</label>
                                    </div>
                                </td>
                                <td><img src="/images/users/avatar-6.jpg" class="avatar-sm rounded-circle me-2" alt="..."> Sarah M. Brooks</td>
                                <td><a href="javascript: void(0);" class="text-body">#INV8473</a> </td>
                                <td> <span class="badge bg-danger-subtle text-danger px-2 py-1 ">Cancel</span></td>
                                <td> $4,214</td>
                                <td> $9,814 </td>
                                <td> 22 May, 2023 </td>
                                <td> Visa</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="#!" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a>
                                        <a href="#!" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                        <a href="#!" class="btn btn-soft-danger btn-sm"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck7">
                                        <label class="form-check-label" for="customCheck7">&nbsp;</label>
                                    </div>
                                </td>
                                <td><img src="/images/users/avatar-7.jpg" class="avatar-sm rounded-circle me-2" alt="..."> Joe K. Hall</td>
                                <td><a href="javascript: void(0);" class="text-body">#INV2150</a> </td>
                                <td> <span class="badge bg-success-subtle text-success py-1 px-2">Completed</span> </td>
                                <td>$2,513</td>
                                <td> $5,891 </td>
                                <td>15 Mar, 2023</td>
                                <td> Paypal </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="#!" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a>
                                        <a href="#!" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                        <a href="#!" class="btn btn-soft-danger btn-sm"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck7">
                                        <label class="form-check-label" for="customCheck7">&nbsp;</label>
                                    </div>
                                </td>
                                <td><img src="/images/users/avatar-8.jpg" class="avatar-sm rounded-circle me-2" alt="...">Ralph Hueber</td>
                                <td><a href="javascript: void(0);" class="text-body">#INV5636</a> </td>
                                <td> <span class="badge bg-success-subtle text-success py-1 px-2">Completed</span> </td>
                                <td>$3,103</td>
                                <td> $8,415 </td>
                                <td>15 Mar, 2023</td>
                                <td> Visa </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="#!" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a>
                                        <a href="#!" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                        <a href="#!" class="btn btn-soft-danger btn-sm"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck7">
                                        <label class="form-check-label" for="customCheck7">&nbsp;</label>
                                    </div>
                                </td>
                                <td><img src="/images/users/avatar-9.jpg" class="avatar-sm rounded-circle me-2" alt="...">Sarah Drescher</td>
                                <td><a href="javascript: void(0);" class="text-body">#INV2940</a> </td>
                                <td> <span class="badge bg-success-subtle text-success py-1 px-2">Completed</span> </td>
                                <td>$2,416</td>
                                <td> $7,715 </td>
                                <td>15 Mar, 2023</td>
                                <td> Mastercard </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="#!" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a>
                                        <a href="#!" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                        <a href="#!" class="btn btn-soft-danger btn-sm"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck7">
                                        <label class="form-check-label" for="customCheck7">&nbsp;</label>
                                    </div>
                                </td>
                                <td><img src="/images/users/avatar-10.jpg" class="avatar-sm rounded-circle me-2" alt="...">Leonie Meister</td>
                                <td><a href="javascript: void(0);" class="text-body">#INV9027</a> </td>
                                <td><span class="badge bg-primary-subtle text-primary py-1 px-2">Pending</span></td>
                                <td>$1,367</td>
                                <td> $3,651 </td>
                                <td>15 Mar, 2023 </td>
                                <td> Paypal </td>
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