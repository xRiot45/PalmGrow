@extends('layouts.vertical', ['title' => 'Sellers List'])

@section('content')

<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="position-relative bg-light p-2 rounded text-center">
                    <img src="/images/seller/zara.svg" alt="" class="avatar-xxl">
                    <div class="position-absolute top-0 end-0 m-1">
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <iconify-icon icon="iconamoon:menu-kebab-vertical-circle-duotone" class="fs-20 align-middle text-muted"></iconify-icon>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Download</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Export</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Import</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-between my-3">
                    <div>
                        <h4 class="mb-1">ZARA International<span class="text-muted fs-13 ms-1">(Fashion) </span></h4>
                        <div>
                            <a href="#!" class="link-primary fs-16 fw-medium">www.zarafashion.co</a>
                        </div>
                    </div>
                    <div>
                        <p class="mb-0"><span class="badge bg-light text-dark fs-12 me-1"><i class="bx bxs-star align-text-top fs-14 text-warning me-1"></i> 4.5</span>3.5k</p>
                    </div>
                </div>
                <div class="">
                    <p class="d-flex align-items-center gap-2 mb-1"><iconify-icon icon="solar:point-on-map-bold-duotone" class="fs-18 text-primary"></iconify-icon>4604 , Philli Lane Kiowa IN 47404</p>
                    <p class="d-flex align-items-center gap-2 mb-1"><iconify-icon icon="solar:letter-bold-duotone" class="fs-18 text-primary"></iconify-icon>zarafashionworld@dayrep.com</p>
                    <p class="d-flex align-items-center gap-2 mb-0"><iconify-icon icon="solar:outgoing-call-rounded-bold-duotone" class="fs-20 text-primary"></iconify-icon>+243 812-801-9335</p>
                </div>
                <div class="d-flex align-items-center justify-content-between mt-3 mb-1">
                    <p class="mb-0 fs-15 fw-medium text-dark">Fashion</p>
                    <div>
                        <p class="mb-0 fs-15 fw-medium text-dark">$200k <span class="ms-1"><iconify-icon icon="solar:course-up-outline" class="text-success"></iconify-icon></span></p>
                    </div>
                </div>
                <div class="progress progress-soft progress-md">
                    <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" style="width: 80%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="p-2 pb-0 mx-n3 mt-2">
                    <div class="row text-center g-2">
                        <div class="col-lg-4 col-4 border-end">
                            <h5 class="mb-1">865</h5>
                            <p class="text-muted mb-0">Item Stock</p>
                        </div>
                        <div class="col-lg-4 col-4 border-end">
                            <h5 class="mb-1">+4.5k</h5>
                            <p class="text-muted mb-0">Sells</p>
                        </div>
                        <div class="col-lg-4 col-4">
                            <h5 class="mb-1">+2k</h5>
                            <p class="text-muted mb-0">Happy Client</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer border-top gap-1 hstack">
                <a href="#!" class="btn btn-primary w-100">View Profile</a>
                <a href="#!" class="btn btn-light w-100">Edit Profile</a>
                <a href="#!" class="btn btn-soft-danger d-inline-flex align-items-center justify-content-center rounded-circle avatar-sm"><i class="bx bx-heart fs-4 align-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="position-relative bg-light p-2 rounded text-center">
                    <img src="/images/seller/rolex.svg" alt="" class="avatar-xxl">
                    <div class="position-absolute top-0 end-0 m-1">
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <iconify-icon icon="iconamoon:menu-kebab-vertical-circle-duotone" class="fs-20 align-middle text-muted"></iconify-icon>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Download</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Export</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Import</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-between my-3">
                    <div>
                        <h4 class="mb-1">Rolex Watches<span class="text-muted fs-13 ms-1">(Watch) </span></h4>
                        <div>
                            <a href="#!" class="link-primary fs-16 fw-medium">www.rolexwatch.co</a>
                        </div>
                    </div>
                    <div>
                        <p class="mb-0"><span class="badge bg-light text-dark fs-12 me-1"><i class="bx bxs-star align-text-top fs-14 text-warning me-1"></i> 4.5</span>1.2k</p>
                    </div>
                </div>
                <div class="">
                    <p class="d-flex align-items-center gap-2 mb-1"><iconify-icon icon="solar:point-on-map-bold-duotone" class="fs-18 text-primary"></iconify-icon>1678 Avenue Milwaukee, WI 53202</p>
                    <p class="d-flex align-items-center gap-2 mb-1"><iconify-icon icon="solar:letter-bold-duotone" class="fs-18 text-primary"></iconify-icon>rolexwatches@dayrep.com</p>
                    <p class="d-flex align-items-center gap-2 mb-0"><iconify-icon icon="solar:outgoing-call-rounded-bold-duotone" class="fs-20 text-primary"></iconify-icon>+243 262-223-1464</p>
                </div>
                <div class="d-flex align-items-center justify-content-between mt-3 mb-1">
                    <p class="mb-0 fs-15 fw-medium text-dark">Watches</p>
                    <div>
                        <p class="mb-0 fs-15 fw-medium text-dark">$349k <span class="ms-1"><iconify-icon icon="solar:course-up-outline" class="text-success"></iconify-icon></span></p>
                    </div>
                </div>
                <div class="progress progress-soft progress-md">
                    <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" style="width: 60%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="p-2 pb-0 mx-n3 mt-2">
                    <div class="row text-center g-2">
                        <div class="col-lg-4 col-4 border-end">
                            <h5 class="mb-1">261</h5>
                            <p class="text-muted mb-0">Item Stock</p>
                        </div>
                        <div class="col-lg-4 col-4 border-end">
                            <h5 class="mb-1">+2.9k</h5>
                            <p class="text-muted mb-0">Sells</p>
                        </div>
                        <div class="col-lg-4 col-4">
                            <h5 class="mb-1">+1.4k</h5>
                            <p class="text-muted mb-0">Happy Client</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer border-top gap-1 hstack">
                <a href="#!" class="btn btn-primary w-100">View Profile</a>
                <a href="#!" class="btn btn-light w-100">Edit Profile</a>
                <a href="#!" class="btn btn-soft-danger d-inline-flex align-items-center justify-content-center rounded-circle avatar-sm"><i class="bx bx-heart fs-4 align-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="position-relative bg-light p-2 rounded text-center">
                    <img src="/images/seller/dyson.svg" alt="" class="avatar-xxl">
                    <div class="position-absolute top-0 end-0 m-1">
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <iconify-icon icon="iconamoon:menu-kebab-vertical-circle-duotone" class="fs-20 align-middle text-muted"></iconify-icon>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Download</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Export</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Import</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-between my-3">
                    <div>
                        <h4 class="mb-1">Dyson Machinery<span class="text-muted fs-13 ms-1">(Electronics) </span></h4>
                        <div>
                            <a href="#!" class="link-primary fs-16 fw-medium">www.dysonmachine.co</a>
                        </div>
                    </div>
                    <div>
                        <p class="mb-0"><span class="badge bg-light text-dark fs-12 me-1"><i class="bx bxs-star align-text-top fs-14 text-warning me-1"></i> 4.1</span>3.7k</p>
                    </div>
                </div>
                <div class="">
                    <p class="d-flex align-items-center gap-2 mb-1"><iconify-icon icon="solar:point-on-map-bold-duotone" class="fs-18 text-primary"></iconify-icon>23 Cubbine Road GHOOLI WA 6426</p>
                    <p class="d-flex align-items-center gap-2 mb-1"><iconify-icon icon="solar:letter-bold-duotone" class="fs-18 text-primary"></iconify-icon>dysonmachine@dayrep.com</p>
                    <p class="d-flex align-items-center gap-2 mb-0"><iconify-icon icon="solar:outgoing-call-rounded-bold-duotone" class="fs-20 text-primary"></iconify-icon>+81(08) 9059 8047</p>
                </div>
                <div class="d-flex align-items-center justify-content-between mt-3 mb-1">
                    <p class="mb-0 fs-15 fw-medium text-dark">Electronics</p>
                    <div>
                        <p class="mb-0 fs-15 fw-medium text-dark">$545k <span class="ms-1"><iconify-icon icon="solar:course-up-outline" class="text-success"></iconify-icon></span></p>
                    </div>
                </div>
                <div class="progress progress-soft progress-md">
                    <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" style="width: 90%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="p-2 pb-0 mx-n3 mt-2">
                    <div class="row text-center g-2">
                        <div class="col-lg-4 col-4 border-end">
                            <h5 class="mb-1">781</h5>
                            <p class="text-muted mb-0">Item Stock</p>
                        </div>
                        <div class="col-lg-4 col-4 border-end">
                            <h5 class="mb-1">+5.3k</h5>
                            <p class="text-muted mb-0">Sells</p>
                        </div>
                        <div class="col-lg-4 col-4">
                            <h5 class="mb-1">+3.1k</h5>
                            <p class="text-muted mb-0">Happy Client</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer border-top gap-1 hstack">
                <a href="#!" class="btn btn-primary w-100">View Profile</a>
                <a href="#!" class="btn btn-light w-100">Edit Profile</a>
                <a href="#!" class="btn btn-soft-danger d-inline-flex align-items-center justify-content-center rounded-circle avatar-sm"><i class="bx bx-heart fs-4 align-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="position-relative bg-light p-2 rounded text-center">
                    <img src="/images/seller/gopro.svg" alt="" class="avatar-xxl">
                    <div class="position-absolute top-0 end-0 m-1">
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <iconify-icon icon="iconamoon:menu-kebab-vertical-circle-duotone" class="fs-20 align-middle text-muted"></iconify-icon>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Download</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Export</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Import</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-between my-3">
                    <div>
                        <h4 class="mb-1">GoPro Camera<span class="text-muted fs-13 ms-1">(Electronics) </span></h4>
                        <div>
                            <a href="#!" class="link-primary fs-16 fw-medium">www.goprocamera.co</a>
                        </div>
                    </div>
                    <div>
                        <p class="mb-0"><span class="badge bg-light text-dark fs-12 me-1"><i class="bx bxs-star align-text-top fs-14 text-warning me-1"></i> 4.3</span>7.2k</p>
                    </div>
                </div>
                <div class="">
                    <p class="d-flex align-items-center gap-2 mb-1"><iconify-icon icon="solar:point-on-map-bold-duotone" class="fs-18 text-primary"></iconify-icon>5 Gaffney Street MIDDLE PARK VIC 3206</p>
                    <p class="d-flex align-items-center gap-2 mb-1"><iconify-icon icon="solar:letter-bold-duotone" class="fs-18 text-primary"></iconify-icon>goprocamera@dayrep.com</p>
                    <p class="d-flex align-items-center gap-2 mb-0"><iconify-icon icon="solar:outgoing-call-rounded-bold-duotone" class="fs-20 text-primary"></iconify-icon>+81(08) 6727 4227</p>
                </div>
                <div class="d-flex align-items-center justify-content-between mt-3 mb-1">
                    <p class="mb-0 fs-15 fw-medium text-dark">Camera</p>
                    <div>
                        <p class="mb-0 fs-15 fw-medium text-dark">$465k <span class="ms-1"><iconify-icon icon="solar:course-up-outline" class="text-success"></iconify-icon></span></p>
                    </div>
                </div>
                <div class="progress progress-soft progress-md">
                    <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" style="width: 40%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="p-2 pb-0 mx-n3 mt-2">
                    <div class="row text-center g-2">
                        <div class="col-lg-4 col-4 border-end">
                            <h5 class="mb-1">890</h5>
                            <p class="text-muted mb-0">Item Stock</p>
                        </div>
                        <div class="col-lg-4 col-4 border-end">
                            <h5 class="mb-1">+10.6k</h5>
                            <p class="text-muted mb-0">Sells</p>
                        </div>
                        <div class="col-lg-4 col-4">
                            <h5 class="mb-1">+6.3k</h5>
                            <p class="text-muted mb-0">Happy Client</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer border-top gap-1 hstack">
                <a href="#!" class="btn btn-primary w-100">View Profile</a>
                <a href="#!" class="btn btn-light w-100">Edit Profile</a>
                <a href="#!" class="btn btn-soft-danger d-inline-flex align-items-center justify-content-center rounded-circle avatar-sm"><i class="bx bx-heart fs-4 align-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="position-relative bg-light p-2 rounded text-center">
                    <img src="/images/seller/h&m.svg" alt="" class="avatar-xxl">
                    <div class="position-absolute top-0 end-0 m-1">
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <iconify-icon icon="iconamoon:menu-kebab-vertical-circle-duotone" class="fs-20 align-middle text-muted"></iconify-icon>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Download</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Export</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Import</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-between my-3">
                    <div>
                        <h4 class="mb-1">H&M<span class="text-muted fs-13 ms-1">(Fashion) </span></h4>
                        <div>
                            <a href="#!" class="link-primary fs-16 fw-medium">www.h&mfashion.co</a>
                        </div>
                    </div>
                    <div>
                        <p class="mb-0"><span class="badge bg-light text-dark fs-12 me-1"><i class="bx bxs-star align-text-top fs-14 text-warning me-1"></i> 4.3</span>15.3k</p>
                    </div>
                </div>
                <div class="">
                    <p class="d-flex align-items-center gap-2 mb-1"><iconify-icon icon="solar:point-on-map-bold-duotone" class="fs-18 text-primary"></iconify-icon>1697 Bay Street Toronto, ON M5J 2R8</p>
                    <p class="d-flex align-items-center gap-2 mb-1"><iconify-icon icon="solar:letter-bold-duotone" class="fs-18 text-primary"></iconify-icon>h&mfashion@dayrep.com</p>
                    <p class="d-flex align-items-center gap-2 mb-0"><iconify-icon icon="solar:outgoing-call-rounded-bold-duotone" class="fs-20 text-primary"></iconify-icon>+81(07) 4049 2261</p>
                </div>
                <div class="d-flex align-items-center justify-content-between mt-3 mb-1">
                    <p class="mb-0 fs-15 fw-medium text-dark">Fashion</p>
                    <div>
                        <p class="mb-0 fs-15 fw-medium text-dark">$800k <span class="ms-1"><iconify-icon icon="solar:course-up-outline" class="text-success"></iconify-icon></span></p>
                    </div>
                </div>
                <div class="progress progress-soft progress-md">
                    <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" style="width: 90%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="p-2 pb-0 mx-n3 mt-2">
                    <div class="row text-center g-2">
                        <div class="col-lg-4 col-4 border-end">
                            <h5 class="mb-1">1309</h5>
                            <p class="text-muted mb-0">Item Stock</p>
                        </div>
                        <div class="col-lg-4 col-4 border-end">
                            <h5 class="mb-1">+21.6k</h5>
                            <p class="text-muted mb-0">Sells</p>
                        </div>
                        <div class="col-lg-4 col-4">
                            <h5 class="mb-1">+8.1k</h5>
                            <p class="text-muted mb-0">Happy Client</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer border-top gap-1 hstack">
                <a href="#!" class="btn btn-primary w-100">View Profile</a>
                <a href="#!" class="btn btn-light w-100">Edit Profile</a>
                <a href="#!" class="btn btn-soft-danger d-inline-flex align-items-center justify-content-center rounded-circle avatar-sm"><i class="bx bx-heart fs-4 align-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="position-relative bg-light p-2 rounded text-center">
                    <img src="/images/seller/huawei.svg" alt="" class="avatar-xxl">
                    <div class="position-absolute top-0 end-0 m-1">
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <iconify-icon icon="iconamoon:menu-kebab-vertical-circle-duotone" class="fs-20 align-middle text-muted"></iconify-icon>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Download</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Export</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Import</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-between my-3">
                    <div>
                        <h4 class="mb-1">Huawei Phone<span class="text-muted fs-13 ms-1">(Electronics) </span></h4>
                        <div>
                            <a href="#!" class="link-primary fs-16 fw-medium">www.huaweiphone.co</a>
                        </div>
                    </div>
                    <div>
                        <p class="mb-0"><span class="badge bg-light text-dark fs-12 me-1"><i class="bx bxs-star align-text-top fs-14 text-warning me-1"></i> 4.1</span>8.2k</p>
                    </div>
                </div>
                <div class="">
                    <p class="d-flex align-items-center gap-2 mb-1"><iconify-icon icon="solar:point-on-map-bold-duotone" class="fs-18 text-primary"></iconify-icon>2182 Blanshard Victoria, BC V8W 2H9</p>
                    <p class="d-flex align-items-center gap-2 mb-1"><iconify-icon icon="solar:letter-bold-duotone" class="fs-18 text-primary"></iconify-icon>huaweiphone@dayrep.com</p>
                    <p class="d-flex align-items-center gap-2 mb-0"><iconify-icon icon="solar:outgoing-call-rounded-bold-duotone" class="fs-20 text-primary"></iconify-icon>+81(07) 250-356-8142</p>
                </div>
                <div class="d-flex align-items-center justify-content-between mt-3 mb-1">
                    <p class="mb-0 fs-15 fw-medium text-dark">Phone</p>
                    <div>
                        <p class="mb-0 fs-15 fw-medium text-dark">$379k <span class="ms-1"><iconify-icon icon="solar:course-up-outline" class="text-success"></iconify-icon></span></p>
                    </div>
                </div>
                <div class="progress progress-soft progress-md">
                    <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" style="width: 40%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="p-2 pb-0 mx-n3 mt-2">
                    <div class="row text-center g-2">
                        <div class="col-lg-4 col-4 border-end">
                            <h5 class="mb-1">356</h5>
                            <p class="text-muted mb-0">Item Stock</p>
                        </div>
                        <div class="col-lg-4 col-4 border-end">
                            <h5 class="mb-1">+4.0k</h5>
                            <p class="text-muted mb-0">Sells</p>
                        </div>
                        <div class="col-lg-4 col-4">
                            <h5 class="mb-1">+6.3k</h5>
                            <p class="text-muted mb-0">Happy Client</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer border-top gap-1 hstack">
                <a href="#!" class="btn btn-primary w-100">View Profile</a>
                <a href="#!" class="btn btn-light w-100">Edit Profile</a>
                <a href="#!" class="btn btn-soft-danger d-inline-flex align-items-center justify-content-center rounded-circle avatar-sm"><i class="bx bx-heart fs-4 align-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="position-relative bg-light p-2 rounded text-center">
                    <img src="/images/seller/nike.svg" alt="" class="avatar-xxl">
                    <div class="position-absolute top-0 end-0 m-1">
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <iconify-icon icon="iconamoon:menu-kebab-vertical-circle-duotone" class="fs-20 align-middle text-muted"></iconify-icon>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Download</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Export</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Import</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-between my-3">
                    <div>
                        <h4 class="mb-1">Nike Clothings<span class="text-muted fs-13 ms-1">(Fashion) </span></h4>
                        <div>
                            <a href="#!" class="link-primary fs-16 fw-medium">www.nikebrand.co</a>
                        </div>
                    </div>
                    <div>
                        <p class="mb-0"><span class="badge bg-light text-dark fs-12 me-1"><i class="bx bxs-star align-text-top fs-14 text-warning me-1"></i> 4.5</span>18.9k</p>
                    </div>
                </div>
                <div class="">
                    <p class="d-flex align-items-center gap-2 mb-1"><iconify-icon icon="solar:point-on-map-bold-duotone" class="fs-18 text-primary"></iconify-icon>2113 Eglinton Avenue Toronto 1A6</p>
                    <p class="d-flex align-items-center gap-2 mb-1"><iconify-icon icon="solar:letter-bold-duotone" class="fs-18 text-primary"></iconify-icon>nikefashion@dayrep.com</p>
                    <p class="d-flex align-items-center gap-2 mb-0"><iconify-icon icon="solar:outgoing-call-rounded-bold-duotone" class="fs-20 text-primary"></iconify-icon>+81(07) 647-405-3676</p>
                </div>
                <div class="d-flex align-items-center justify-content-between mt-3 mb-1">
                    <p class="mb-0 fs-15 fw-medium text-dark">Clothings</p>
                    <div>
                        <p class="mb-0 fs-15 fw-medium text-dark">$890k <span class="ms-1"><iconify-icon icon="solar:course-up-outline" class="text-success"></iconify-icon></span></p>
                    </div>
                </div>
                <div class="progress progress-soft progress-md">
                    <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" style="width: 70%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="p-2 pb-0 mx-n3 mt-2">
                    <div class="row text-center g-2">
                        <div class="col-lg-4 col-4 border-end">
                            <h5 class="mb-1">12k</h5>
                            <p class="text-muted mb-0">Item Stock</p>
                        </div>
                        <div class="col-lg-4 col-4 border-end">
                            <h5 class="mb-1">+19.0k</h5>
                            <p class="text-muted mb-0">Sells</p>
                        </div>
                        <div class="col-lg-4 col-4">
                            <h5 class="mb-1">+16.0k</h5>
                            <p class="text-muted mb-0">Happy Client</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer border-top gap-1 hstack">
                <a href="#!" class="btn btn-primary w-100">View Profile</a>
                <a href="#!" class="btn btn-light w-100">Edit Profile</a>
                <a href="#!" class="btn btn-soft-danger d-inline-flex align-items-center justify-content-center rounded-circle avatar-sm"><i class="bx bx-heart fs-4 align-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="position-relative bg-light p-2 rounded text-center">
                    <img src="/images/seller/thenorthface.svg" alt="" class="avatar-xxl">
                    <div class="position-absolute top-0 end-0 m-1">
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <iconify-icon icon="iconamoon:menu-kebab-vertical-circle-duotone" class="fs-20 align-middle text-muted"></iconify-icon>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Download</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Export</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Import</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-between my-3">
                    <div>
                        <h4 class="mb-1">The North Face<span class="text-muted fs-13 ms-1">(Fashion) </span></h4>
                        <div>
                            <a href="#!" class="link-primary fs-16 fw-medium">www.northface.co</a>
                        </div>
                    </div>
                    <div>
                        <p class="mb-0"><span class="badge bg-light text-dark fs-12 me-1"><i class="bx bxs-star align-text-top fs-14 text-warning me-1"></i> 4.4</span>12.7k</p>
                    </div>
                </div>
                <div class="">
                    <p class="d-flex align-items-center gap-2 mb-1"><iconify-icon icon="solar:point-on-map-bold-duotone" class="fs-18 text-primary"></iconify-icon>1377 49th Avenue Clyde River,0E0</p>
                    <p class="d-flex align-items-center gap-2 mb-1"><iconify-icon icon="solar:letter-bold-duotone" class="fs-18 text-primary"></iconify-icon>thenorthface@dayrep.com</p>
                    <p class="d-flex align-items-center gap-2 mb-0"><iconify-icon icon="solar:outgoing-call-rounded-bold-duotone" class="fs-20 text-primary"></iconify-icon>+81(07) 867-924-6639</p>
                </div>
                <div class="d-flex align-items-center justify-content-between mt-3 mb-1">
                    <p class="mb-0 fs-15 fw-medium text-dark">Clothings</p>
                    <div>
                        <p class="mb-0 fs-15 fw-medium text-dark">$457k <span class="ms-1"><iconify-icon icon="solar:course-up-outline" class="text-success"></iconify-icon></span></p>
                    </div>
                </div>
                <div class="progress progress-soft progress-md">
                    <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" style="width: 30%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="p-2 pb-0 mx-n3 mt-2">
                    <div class="row text-center g-2">
                        <div class="col-lg-4 col-4 border-end">
                            <h5 class="mb-1">1.6k</h5>
                            <p class="text-muted mb-0">Item Stock</p>
                        </div>
                        <div class="col-lg-4 col-4 border-end">
                            <h5 class="mb-1">+13.9k</h5>
                            <p class="text-muted mb-0">Sells</p>
                        </div>
                        <div class="col-lg-4 col-4">
                            <h5 class="mb-1">+2.1k</h5>
                            <p class="text-muted mb-0">Happy Client</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer border-top gap-1 hstack">
                <a href="#!" class="btn btn-primary w-100">View Profile</a>
                <a href="#!" class="btn btn-light w-100">Edit Profile</a>
                <a href="#!" class="btn btn-soft-danger d-inline-flex align-items-center justify-content-center rounded-circle avatar-sm"><i class="bx bx-heart fs-4 align-middle"></i></a>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script-bottom')
@vite(['resources/js/pages/app-ecommerce-seller.js'])
@endsection