@extends('layouts.vertical', ['title' => 'Profile'])

@section('content')

<div class="row">
    <div class="col-xl-9 col-lg-8">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="bg-primary profile-bg rounded-top position-relative mx-n3 mt-n3">
                    <img src="/images/users/avatar-1.jpg" alt="" class="avatar-xl border border-light border-3 rounded-circle position-absolute top-100 start-0 translate-middle ms-5">
                </div>
                <div class="mt-5 d-flex flex-wrap align-items-center justify-content-between">
                    <div>
                        <h4 class="mb-1">Gaston Lapierre <i class='bx bxs-badge-check text-success align-middle'></i></h4>
                        <p class="mb-0">Project Head Manager</p>
                    </div>
                    <div class="d-flex align-items-center gap-2 my-2 my-lg-0">
                        <a href="#!" class="btn btn-info"><i class='bx bx-message-dots'></i> Message</a>
                        <a href="#!" class="btn btn-outline-primary"><i class="bx bx-plus"></i> Follow</a>
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <iconify-icon icon="solar:menu-dots-bold" class="fs-20 align-middle text-muted"></iconify-icon>
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
                <div class="row mt-3 gy-2">
                    <div class="col-lg-2 col-6">
                        <div class="d-flex align-items-center gap-2 border-end">
                            <div class="">
                                <iconify-icon icon="solar:clock-circle-bold-duotone" class="fs-28 text-primary"></iconify-icon>
                            </div>
                            <div>
                                <h5 class="mb-1">3+ Years Job</h5>
                                <p class="mb-0">Experience</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-6">
                        <div class="d-flex align-items-center gap-2 border-end">
                            <div class="">
                                <iconify-icon icon="solar:cup-star-bold-duotone" class="fs-28 text-primary"></iconify-icon>
                            </div>
                            <div>
                                <h5 class="mb-1">5 Certificate</h5>
                                <p class="mb-0">Achieved</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-6">
                        <div class="d-flex align-items-center gap-2">
                            <div class="">
                                <iconify-icon icon="solar:notebook-bold-duotone" class="fs-28 text-primary"></iconify-icon>
                            </div>
                            <div>
                                <h5 class="mb-1">2 Internship</h5>
                                <p class="mb-0">Completed</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Personal Information</h4>
            </div>
            <div class="card-body">
                <div class="">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <div class="avatar-sm bg-light d-flex align-items-center justify-content-center rounded">
                            <iconify-icon icon="solar:backpack-bold-duotone" class="fs-20 text-secondary"></iconify-icon>
                        </div>
                        <p class="mb-0 fs-14">Project Head Manager</p>
                    </div>
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <div class="avatar-sm bg-light d-flex align-items-center justify-content-center rounded">
                            <iconify-icon icon="solar:square-academic-cap-2-bold-duotone" class="fs-20 text-secondary"></iconify-icon>
                        </div>
                        <p class="mb-0 fs-14">Went to <span class="text-dark fw-semibold">Oxford International</span></p>
                    </div>
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <div class="avatar-sm bg-light d-flex align-items-center justify-content-center rounded">
                            <iconify-icon icon="solar:map-point-bold-duotone" class="fs-20 text-secondary"></iconify-icon>
                        </div>
                        <p class="mb-0 fs-14">Lives in <span class="text-dark fw-semibold">Pittsburgh, PA 15212</span></p>
                    </div>
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <div class="avatar-sm bg-light d-flex align-items-center justify-content-center rounded">
                            <iconify-icon icon="solar:users-group-rounded-bold-duotone" class="fs-20 text-secondary"></iconify-icon>
                        </div>
                        <p class="mb-0 fs-14">Followed by <span class="text-dark fw-semibold">16.6k People</span></p>
                    </div>
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <div class="avatar-sm bg-light d-flex align-items-center justify-content-center rounded">
                            <iconify-icon icon="solar:letter-bold-duotone" class="fs-20 text-secondary"></iconify-icon>
                        </div>
                        <p class="mb-0 fs-14">Email <a href="#!" class="text-primary fw-semibold">hello@dundermuffilin.com</a></p>
                    </div>
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <div class="avatar-sm bg-light d-flex align-items-center justify-content-center rounded">
                            <iconify-icon icon="solar:link-bold-duotone" class="fs-20 text-secondary"></iconify-icon>
                        </div>
                        <p class="mb-0 fs-14">Website <a href="#!" class="text-primary fw-semibold">www.larkon.co</a></p>
                    </div>
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <div class="avatar-sm bg-light d-flex align-items-center justify-content-center rounded">
                            <iconify-icon icon="solar:global-bold-duotone" class="fs-20 text-secondary"></iconify-icon>
                        </div>
                        <p class="mb-0 fs-14">Language <span class="text-dark fw-semibold">English , Spanish , German</span></p>
                    </div>

                    <div class="d-flex align-items-center gap-2">
                        <div class="avatar-sm bg-light d-flex align-items-center justify-content-center rounded">
                            <iconify-icon icon="solar:check-circle-bold-duotone" class="fs-20 text-secondary"></iconify-icon>
                        </div>
                        <p class="mb-0 fs-14">Status <span class="badge bg-success-subtle text-success ms-1">Active</span></p>
                    </div>
                    <div class="mt-2">
                        <a href="#!" class="text-primary">View More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-8 col-lg-7">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">About</h4>
            </div>
            <div class="card-body">
                <p>I'm the model of the new Project Head Manager. I've combined a deep background in brand management at blue chip CPG companies with eCommerce growth marketing at the world's biggest retailer. I've run SingleFire I've created world-class campaigns; I've built digital marketing organizations from the ground up. I have over 20 years' experience leading... <a href="#!" class="text-primary">See more</a></p>
                <h4 class="card-title mb-2">My Approach :</h4>
                <p>When it comes to Project Head Manager, I believe in a holistic approach that combines creativity with technical expertise. I start by understanding your unique vision and goals, then work tirelessly to bring that vision to life. Whether you need a sleek portfolio site, an engaging e-commerce platform, or anything in between, I've got you covered.</p>
                <div class="row g-2 mt-2 mb-4">
                    <div class="col-lg-6">
                        <div class="border p-3 rounded">
                            <h4 class="card-title">Marketing expertise</h4>
                            <div class="d-flex gap-2 flex-wrap mt-3">
                                <span class="badge bg-body text-muted px-2 py-1 fs-12">#Leadership</span>
                                <span class="badge bg-body text-muted px-2 py-1 fs-12">#Advertising</span>
                                <span class="badge bg-body text-muted px-2 py-1 fs-12">#Public-relations</span>
                                <span class="badge bg-body text-muted px-2 py-1 fs-12">#Branding-manage</span>
                            </div>
                            <p class="mb-0 text-dark mt-3">Open to networking :<span class="badge bg-success-subtle text-success ms-1">Yes</span></p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="border p-3 rounded">
                            <h4 class="card-title">Marketing interests</h4>
                            <div class="d-flex gap-2 flex-wrap mt-3">
                                <span class="badge bg-body text-muted px-2 py-1 fs-12">#Event-marketing</span>
                                <span class="badge bg-body text-muted px-2 py-1 fs-12">#Performance-marketing</span>
                                <span class="badge bg-body text-muted px-2 py-1 fs-12">#Account-based-marketing</span>
                            </div>
                            <p class="mb-0 text-dark mt-3">Open to advising :<span class="badge bg-success-subtle text-success ms-1">Yes</span></p>
                        </div>
                    </div>
                </div>
                <h4 class="card-title">My Core Skills :</h4>
                <div class="row mt-2">
                    <div class="col-lg-4">
                        <div class="d-flex align-items-center justify-content-satrt gap-2">
                            <ul class="d-flex text-warning m-0 fs-20 list-unstyled">
                                <li>
                                    <i class="bx bxs-star"></i>
                                </li>
                                <li>
                                    <i class="bx bxs-star"></i>
                                </li>
                                <li>
                                    <i class="bx bxs-star"></i>
                                </li>
                                <li>
                                    <i class="bx bxs-star"></i>
                                </li>
                            </ul>
                            <p class="fw-medium mb-0 text-dark fs-15">Inbound Marketing</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="d-flex align-items-center justify-content-satrt gap-2">
                            <ul class="d-flex text-warning m-0 fs-20 list-unstyled">
                                <li>
                                    <i class="bx bxs-star"></i>
                                </li>
                                <li>
                                    <i class="bx bxs-star"></i>
                                </li>
                                <li>
                                    <i class="bx bxs-star"></i>
                                </li>
                            </ul>
                            <p class="fw-medium mb-0 text-dark fs-15">Entrepreneurship</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="d-flex align-items-center justify-content-satrt gap-2">
                            <ul class="d-flex text-warning m-0 fs-20 list-unstyled">
                                <li>
                                    <i class="bx bxs-star"></i>
                                </li>
                                <li>
                                    <i class="bx bxs-star"></i>
                                </li>
                            </ul>
                            <p class="fw-medium mb-0 text-dark fs-15">Growth Marketing</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-5">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="avatar bg-info d-flex align-items-center justify-content-center rounded mx-auto mb-2">
                            <iconify-icon icon="solar:cup-star-bold" class="fs-34 text-white"></iconify-icon>
                        </div>
                        <h3 class="mb-1">+12</h3>
                        <p class="mb-0 fw-semibold fs-16">Achievements</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="avatar bg-info d-flex align-items-center justify-content-center rounded mx-auto mb-2">
                            <iconify-icon icon="solar:medal-star-circle-bold-duotone" class="fs-34 text-white"></iconify-icon>
                        </div>
                        <h3 class="mb-1">+24</h3>
                        <p class="mb-0 fw-semibold fs-16">Accomplishments</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card overflow-hidden z-1">
            <div class="card-body text-center">
                <h4 class="card-title mb-2">Share your profile</h4>
                <p class="text-muted">Now that your agency is created, go ahead and share it to start generating leads.</p>
                <img src="/images/qr-code.png" alt="" class="avatar-xl">
                <ul class="list-inline d-flex gap-1 my-3  align-items-center justify-content-center">
                    <li class="list-inline-item">
                        <a href="javascript: void(0);" class="btn btn-soft-primary avatar-sm d-flex align-items-center justify-content-center fs-20">
                            <i class="bx bxl-facebook"></i>
                        </a>
                    </li>

                    <li class="list-inline-item">
                        <a href="javascript: void(0);" class="btn btn-soft-danger avatar-sm d-flex align-items-center justify-content-center fs-20">
                            <i class="bx bxl-instagram"></i>
                        </a>
                    </li>

                    <li class="list-inline-item">
                        <a href="javascript: void(0);" class="btn btn-soft-info avatar-sm d-flex align-items-center justify-content-center  fs-20">
                            <i class="bx bxl-twitter"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="javascript: void(0);" class="btn btn-soft-success avatar-sm d-flex align-items-center justify-content-center fs-20">
                            <i class="bx bxl-whatsapp"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="javascript: void(0);" class="btn btn-soft-warning avatar-sm d-flex align-items-center justify-content-center fs-20">
                            <i class="bx bx-envelope"></i>
                        </a>
                    </li>
                </ul>
                <p class="text-muted">Copy the URL below and share it with your friends:</p>
                <p class="d-flex align-items-center border p-2 rounded-2 border-dashed bg-body text-start mb-0">https://larkon-mileage.com <a href="#!" class="ms-auto fs-4"><i class="ti ti-copy"></i></a></p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Popular Filters</h4>
            </div>
            <div class="card-body">
                <div class="d-flex flex-wrap gap-2" role="group" aria-label="Basic checkbox toggle button group">
                    <input type="checkbox" class="btn-check" id="all-topic" checked>
                    <label class="btn bg-body rounded-pill d-flex justify-content-center align-items-center" for="all-topic">All Topics (23)</label>

                    <input type="checkbox" class="btn-check" id="saas">
                    <label class="btn bg-body rounded-pill d-flex justify-content-center align-items-center" for="saas">#SaaS (21)</label>

                    <input type="checkbox" class="btn-check" id="latam">
                    <label class="btn bg-body rounded-pill d-flex justify-content-center align-items-center" for="latam">#LatAm (5)</label>

                    <input type="checkbox" class="btn-check" id="inbound">
                    <label class="btn bg-body rounded-pill d-flex justify-content-center align-items-center" for="inbound">#inbound (4)</label>

                    <input type="checkbox" class="btn-check" id="europe">
                    <label class="btn bg-body rounded-pill d-flex justify-content-center align-items-center" for="europe">#Europe (25)</label>

                    <input type="checkbox" class="btn-check" id="performance">
                    <label class="btn bg-body rounded-pill d-flex justify-content-center align-items-center" for="performance">#Performance-marketing (7)</label>

                    <input type="checkbox" class="btn-check" id="facebook">
                    <label class="btn bg-body rounded-pill d-flex justify-content-center align-items-center" for="facebook">#Facebook-advertising (8)</label>
                </div>
            </div>
            <div class="card-footer border-top text-center">
                <a href="#!" class="link-primary">View More</a>
            </div>
        </div>
    </div>
    <div class="col-lg-9">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center gap-2">
                    <img src="/images/users/avatar-1.jpg" alt="" class="avatar-md rounded-circle border border-light border-3">
                    <div>
                        <h4 class="mb-1">Gaston Lapierre , <span class="fs-13 text-muted fw-medium ms-1">Project Head Manager . Nov 16</span></h4>
                        <p class="mb-0">Asked a question <a href="#!" class="text-primary ms-1">#inbound</a> <a href="#!" class="text-primary ms-1">#SaaS</a></p>
                    </div>
                </div>
                <h4 class="mt-3">Do you have any experience with deploying @Hubspot for a SaaS business with both a direct and self-serve model?</h4>
                <p class="mb-0">We are a Series A B2B startup offering a custom solution. Currently, we are utilizing @MixPanel and collaborating with @Division of Labor to rebuild our pages. Shoutout to @Jennifer Smith for her support...<a href="#!" class="link-primary"> See more</a></p>
            </div>
            <div class="card-footer border-top">
                <div class="row">
                    <div class="col-lg-2 col-4">
                        <a href="#!" class="text-primary d-inline-flex gap-1 align-items-center fs-14"><iconify-icon icon="solar:pen-new-square-broken" class="fs-16"></iconify-icon> Answer</a>
                    </div>
                    <div class="col-lg-2 col-4">
                        <a href="#!" class="text-dark d-inline-flex gap-1 align-items-center fs-14"><iconify-icon icon="solar:hand-shake-broken" class="fs-16"></iconify-icon> Thanks</a>
                    </div>
                    <div class="col-lg-2 col-4">
                        <a href="#!" class="text-dark d-inline-flex gap-1 align-items-center fs-14"><iconify-icon icon="solar:lightbulb-minimalistic-broken" class="fs-16"></iconify-icon> Insightful</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center gap-2">
                    <img src="/images/users/avatar-1.jpg" alt="" class="avatar-md rounded-circle border border-light border-3">
                    <div>
                        <h4 class="mb-1">Gaston Lapierre , <span class="fs-13 text-muted fw-medium ms-1">Project Head Manager . Nov 11</span></h4>
                        <p class="mb-0">Asked a question <a href="#!" class="text-primary ms-1">#LatAm</a> <a href="#!" class="text-primary ms-1">#Europe</a></p>
                    </div>
                </div>
                <h4 class="mt-3">Looking for a new landing page optimization vendor</h4>
                <p class="mb-0">We are currently using @Optimizely, but find that they are missing a number with a custom solution that no... <a href="#!" class="link-primary"> See more</a></p>
            </div>
            <div class="card-footer border-top">
                <div class="row">
                    <div class="col-lg-2 col-4">
                        <a href="#!" class="text-primary d-inline-flex gap-1 align-items-center fs-14"><iconify-icon icon="solar:pen-new-square-broken" class="fs-16"></iconify-icon> Answer</a>
                    </div>
                    <div class="col-lg-2 col-4">
                        <a href="#!" class="text-dark d-inline-flex gap-1 align-items-center fs-14"><iconify-icon icon="solar:hand-shake-broken" class="fs-16"></iconify-icon> Thanks</a>
                    </div>
                    <div class="col-lg-2 col-4">
                        <a href="#!" class="text-dark d-inline-flex gap-1 align-items-center fs-14"><iconify-icon icon="solar:lightbulb-minimalistic-broken" class="fs-16"></iconify-icon> Insightful</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center gap-2">
                    <img src="/images/users/avatar-1.jpg" alt="" class="avatar-md rounded-circle border border-light border-3">
                    <div>
                        <h4 class="mb-1">Gaston Lapierre , <span class="fs-13 text-muted fw-medium ms-1">Project Head Manager . Nov 08</span></h4>
                        <p class="mb-0">Asked a question <a href="#!" class="text-primary ms-1">#Performance-marketing</a> <a href="#!" class="text-primary ms-1">#CRM</a></p>
                    </div>
                </div>
                <h4 class="mt-3">Why Your Company Needs a CRM to Grow Better?</h4>
                <p class="mb-0">CRMs are powerful tools that help you expedite business growth while number with a custom eliminating friction, improving cross-team collaboration, managing your contact records, syncing...<a href="#!" class="link-primary"> See more</a></p>
            </div>
            <div class="card-footer border-top">
                <div class="row">
                    <div class="col-lg-2 col-4">
                        <a href="#!" class="text-primary d-inline-flex gap-1 align-items-center fs-14"><iconify-icon icon="solar:pen-new-square-broken" class="fs-16"></iconify-icon> Answer</a>
                    </div>
                    <div class="col-lg-2 col-4">
                        <a href="#!" class="text-dark d-inline-flex gap-1 align-items-center fs-14"><iconify-icon icon="solar:hand-shake-broken" class="fs-16"></iconify-icon> Thanks</a>
                    </div>
                    <div class="col-lg-2 col-4">
                        <a href="#!" class="text-dark d-inline-flex gap-1 align-items-center fs-14"><iconify-icon icon="solar:lightbulb-minimalistic-broken" class="fs-16"></iconify-icon> Insightful</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection