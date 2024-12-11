@extends('layouts.vertical', ['title' => 'Customer Details'])

@section('content')

<div class="row">
    <div class="col-lg-4">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="bg-primary profile-bg rounded-top p-5 position-relative mx-n3 mt-n3">
                    <img src="/images/users/avatar-2.jpg" alt="" class="avatar-lg border border-light border-3 rounded-circle position-absolute top-100 start-0 translate-middle ms-5">
                </div>
                <div class="mt-4 pt-3">
                    <h4 class="mb-1"> Michael A. Miner<i class="bx bxs-badge-check text-success align-middle"></i></h4>
                    <div class="mt-2">
                        <a href="#!" class="link-primary fs-15">@michael_cus_2024</a>
                        <p class="fs-15 mb-1 mt-1"><span class="text-dark fw-semibold">Email : </span> michaelaminer@dayrep.com</p>
                        <p class="fs-15 mb-0 mt-1"><span class="text-dark fw-semibold">Phone : </span> +28 (57) 760-010-27</p>
                    </div>
                </div>
            </div>
            <div class="card-footer border-top gap-1 hstack">
                <a href="#!" class="btn btn-primary w-100">Send Message</a>
                <a href="#!" class="btn btn-light w-100">Analytics</a>
                <a href="#!" class="btn btn-soft-dark d-inline-flex align-items-center justify-content-center rounded avatar-sm"><i class='bx bx-edit-alt fs-18'></i></a>
            </div>
        </div>

        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div>
                    <h4 class="card-title">Customer Details</h4>
                </div>
                <div>
                    <span class="badge bg-success-subtle text-success px-2 py-1">Active User</span>
                </div>

            </div>
            <div class="card-body py-2">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <tbody>
                            <tr>
                                <td class="px-0">
                                    <p class="d-flex mb-0 align-items-center gap-1 fw-semibold text-dark">Account ID : </p>
                                </td>
                                <td class="text-dark fw-medium px-0">#AC-278699</td>
                            </tr>
                            <tr>
                                <td class="px-0">
                                    <p class="d-flex mb-0 align-items-center gap-1 fw-semibold text-dark"> Invoice Email : </p>
                                </td>
                                <td class="text-dark fw-medium px-0">michaelaminer@dayrep.com</td>
                            </tr>
                            <tr>
                                <td class="px-0">
                                    <p class="d-flex mb-0 align-items-center gap-1 fw-semibold text-dark"> Delivery Address : </p>
                                </td>
                                <td class="text-dark fw-medium px-0">62, rue des Nations Unies 22000 SAINT-BRIEUC</td>
                            </tr>
                            <tr>
                                <td class="px-0">
                                    <p class="d-flex mb-0 align-items-center gap-1 fw-semibold text-dark"> Language : </p>
                                </td>
                                <td class="text-dark fw-medium px-0">English</td>
                            </tr>
                            <tr>
                                <td class="px-0">
                                    <p class="d-flex mb-0 align-items-center gap-1 fw-semibold text-dark"> Latest Invoice Id : </p>
                                </td>
                                <td class="text-dark fw-medium px-0">#INV2540</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header border-bottom border-dashed">
                <div class="d-flex align-items-center gap-2">
                    <div class="d-block">
                        <h4 class="card-title mb-1">Latest Invoice</h4>
                        <p class="mb-0 text-muted">Total 234 file, 2.5GB space used</p>
                    </div>
                    <div class="ms-auto">
                        <a href="#!" class="btn btn-primary btn-sm">View All</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex p-2 rounded align-items-center gap-2 bg-light-subtle">
                    <div class="avatar bg-primary-subtle d-flex align-items-center justify-content-center rounded-circle">
                        <iconify-icon icon="solar:file-download-bold" class="text-primary fs-3"></iconify-icon>
                    </div>
                    <div class="d-block">
                        <a href="#!" class="text-dark fw-medium">Invoice Id #INV2540</a>
                        <p class="text-muted mb-0 fs-13">16 May 2024</p>
                    </div>
                    <div class="ms-auto text-end">
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle arrow-none card-drop p-0" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ti ti-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="javascript:void(0);" class="dropdown-item">Download</a>
                                <a href="javascript:void(0);" class="dropdown-item">Share</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex p-2 rounded align-items-center gap-2 bg-light-subtle mt-2">
                    <div class="avatar bg-primary-subtle d-flex align-items-center justify-content-center rounded-circle">
                        <iconify-icon icon="solar:file-download-bold" class="text-primary fs-3"></iconify-icon>
                    </div>
                    <div class="d-block">
                        <a href="#!" class="text-dark fw-medium">Invoice Id #INV0914</a>
                        <p class="text-muted mb-0 fs-13">17 Jan 2024</p>
                    </div>
                    <div class="ms-auto text-end">
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle arrow-none card-drop p-0" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ti ti-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="javascript:void(0);" class="dropdown-item">Download</a>
                                <a href="javascript:void(0);" class="dropdown-item">Share</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex p-2 rounded align-items-center gap-2 bg-light-subtle mt-2">
                    <div class="avatar bg-primary-subtle  d-flex align-items-center justify-content-center rounded-circle">
                        <iconify-icon icon="solar:file-download-bold" class="text-primary fs-3"></iconify-icon>
                    </div>
                    <div class="d-block">
                        <a href="#!" class="text-dark fw-medium">Invoice Id #INV3801</a>
                        <p class="text-muted mb-0 fs-13">09 Nov 2023</p>
                    </div>
                    <div class="ms-auto text-end">
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle arrow-none card-drop p-0" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ti ti-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="javascript:void(0);" class="dropdown-item">Download</a>
                                <a href="javascript:void(0);" class="dropdown-item">Share</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex p-2 rounded align-items-center gap-2 bg-light-subtle mt-2 mb-1">
                    <div class="avatar bg-primary-subtle d-flex align-items-center justify-content-center rounded-circle">
                        <iconify-icon icon="solar:file-download-bold" class="text-primary fs-3"></iconify-icon>
                    </div>
                    <div class="d-block">
                        <a href="#!" class="text-dark fw-medium">Invoice Id #INV4782</a>
                        <p class="text-muted mb-0 fs-13">21 Aug 2023</p>
                    </div>
                    <div class="ms-auto text-end">
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle arrow-none card-drop p-0" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ti ti-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="javascript:void(0);" class="dropdown-item">Download</a>
                                <a href="javascript:void(0);" class="dropdown-item">Share</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h4 class="card-title mb-2 d-flex align-items-center gap-2">Total Invoice</h4>
                                <p class="text-muted fw-medium fs-22 mb-0">234</p>
                            </div>
                            <div>
                                <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                    <iconify-icon icon="solar:bill-list-bold-duotone" class="fs-32 text-primary avatar-title"></iconify-icon>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h4 class="card-title mb-2 d-flex align-items-center gap-2">Total Order</h4>
                                <p class="text-muted fw-medium fs-22 mb-0">219</p>
                            </div>
                            <div>
                                <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                    <iconify-icon icon="solar:box-bold-duotone" class="fs-32 text-primary avatar-title"></iconify-icon>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h4 class="card-title mb-2 d-flex align-items-center gap-2">Total Expense</h4>
                                <p class="text-muted fw-medium fs-22 mb-0">$2,189</p>
                            </div>
                            <div>
                                <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                    <iconify-icon icon="solar:chat-round-money-bold-duotone" class="fs-32 text-primary avatar-title"></iconify-icon>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Transaction History</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle mb-0 table-hover table-centered">
                        <thead class="bg-light-subtle">
                            <tr>
                                <th>Invoice ID</th>
                                <th>Status</th>
                                <th>Total Amount</th>
                                <th>Due Date</th>
                                <th>Payment Method</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="javascript: void(0);" class="text-body">#INV2540</a> </td>
                                <td> <span class="badge bg-success-subtle text-success py-1 px-2">Completed</span> </td>
                                <td> $421.00 </td>
                                <td> 07 Jan, 2023</td>
                                <td> Mastercard </td>
                            </tr>

                            <tr>
                                <td><a href="javascript: void(0);" class="text-body">#INV3924</a> </td>
                                <td> <span class="badge bg-danger-subtle text-danger px-2 py-1">Cancel</span> </td>
                                <td> $736.00 </td>
                                <td> 03 Dec, 2023</td>
                                <td> Visa </td>
                            </tr>

                            <tr>
                                <td><a href="javascript: void(0);" class="text-body">#INV5032</a> </td>
                                <td>
                                    <span class="badge bg-success-subtle text-success py-1 px-2">Completed</span>
                                </td>
                                <td> $347.00</td>
                                <td> 28 Sep, 2023 </td>
                                <td> Paypal </td>
                            </tr>
                            <tr>
                                <td><a href="javascript: void(0);" class="text-body">#INV1695</a> </td>
                                <td><span class="badge bg-primary-subtle text-primary py-1 px-2">Pending</span></td>
                                <td> $457.00 </td>
                                <td>10 Aug, 2023</td>
                                <td> Mastercard</td>
                            </tr>
                            <tr>
                                <td><a href="javascript: void(0);" class="text-body">#INV8473</a> </td>
                                <td> <span class="badge bg-success-subtle text-success px-2 py-1 ">Completed</span></td>
                                <td> $414.00</td>
                                <td> 22 May, 2023 </td>
                                <td> Visa</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer border-top">
                <ul class="pagination pagination-rounded m-0 justify-content-end">
                    <li class="page-item">
                        <a href="#" class="page-link"><i class="bx bx-left-arrow-alt"></i></a>
                    </li>
                    <li class="page-item active">
                        <a href="#" class="page-link">1</a>
                    </li>
                    <li class="page-item">
                        <a href="#" class="page-link">2</a>
                    </li>
                    <li class="page-item">
                        <a href="#" class="page-link">3</a>
                    </li>
                    <li class="page-item">
                        <a href="#" class="page-link"><i class="bx bx-right-arrow-alt"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="/images/user-profile.png" alt="" class="img-fluid">
                        <h4><i class='bx bxs-coin-stack text-primary'></i> 3,764 <span class="text-muted fw-medium">Points Earned</span> </h4>
                        <p class="mb-0">Collect reward points with each purchase.</p>
                    </div>
                    <div class="card-footer border-top gap-1 hstack">
                        <a href="#!" class="btn btn-primary w-100">Earn Point</a>
                        <a href="#!" class="btn btn-light w-100">View Items</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex gap-3">
                            <div class="avatar bg-light d-flex align-items-center justify-content-center rounded-circle">
                                <i class="bx bx-down-arrow-alt fs-30"></i>
                            </div>
                            <div class="d-block">
                                <h4 class="text-dark fw-medium mb-1">Payment Arrived</h4>
                                <p class="mb-0 text-muted">23 min ago</p>
                            </div>
                            <div class="ms-auto">
                                <h4 class="text-dark fw-medium mb-1">$ 1,340</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-2">

                            <img src="/images/users/avatar-2.jpg" alt="avatar-3" class="avatar rounded-circle">

                            <div class="d-block">
                                <h4 class="text-dark fw-medium mb-1">Michael A. Miner</h4>
                                <p class="mb-0 text-muted">Welcome Back</p>
                            </div>
                            <div class="ms-auto">
                                <span class="text-muted">
                                    <a href="#!" class="link-reset fs-3"><iconify-icon icon="solar:settings-bold"></iconify-icon></a>
                                </span>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="d-flex align-items-center">
                                <h5 class="text-dark mb-0">All Account <span class="text-muted fw-normal ms-1"><i class="bx bxs-circle fs-10"></i></span><span class="text-muted fw-normal ms-1">Total Balance</span></h5>
                                <div class="ms-auto">
                                    <a href="#!" class="link-reset fw-medium">UTS <i class="bx bx-down-arrow-alt text-danger"></i></a>
                                </div>
                            </div>
                            <h3 class="fw-semibold mt-2 mb-0">$4,700 <span class="fs-5 text-muted ms-1">+$232</span></h3>
                            <div id="chart2" class="apex-charts mt-3"></div>
                        </div>
                    </div>
                    <div class="card-footer border-top gap-1 hstack">
                        <a href="#!" class="btn btn-primary w-100">Send</a>
                        <a href="#!" class="btn btn-light w-100">Receive</a>
                        <a href="#!" class="btn btn-soft-dark d-inline-flex align-items-center justify-content-center rounded avatar-sm"><i class="bx bx-plus fs-18"></i></a>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

@endsection

@section('script-bottom')
@vite(['resources/js/pages/customer-details.js'])
@endsection