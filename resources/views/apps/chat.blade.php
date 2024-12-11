@extends('layouts.vertical', ['title' => 'Chat'])

@section('css')
@vite(['node_modules/swiper/swiper-bundle.min.css'])
@endsection

@section('content')

<div class="row g-1">
    <div class="col-xxl-3">
        <div class="offcanvas-xxl offcanvas-start h-100" tabindex="-1" id="Contactoffcanvas" aria-labelledby="ContactoffcanvasLabel">
            <div class="card position-relative overflow-hidden">
                <div class="card-header border-0 d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Chat</h4>
                    <a href="#user-setting" class="fs-18" type="button" data-bs-toggle="offcanvas" aria-haspopup="true" aria-expanded="true">
                        <i class="bx bx-cog"></i>
                    </a>
                </div>

                <form class="chat-search px-3">
                    <div class="chat-search-box">
                        <input class="form-control" type="text" name="search" placeholder="Search ...">
                        <button type="submit" class="btn btn-sm btn-link search-icon p-0"><i class="bx bx-search-alt"></i></button>
                    </div>
                </form>

                <div class="swiper mySwiper p-1 mx-3">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide avatar-sm">
                            <div class="chat-user-status-box">
                                <span><img src="/images/users/avatar-1.jpg" alt="avatar-1" class="img-fluid avatar-sm rounded-circle avatar-border" /></span>
                            </div>
                        </div>
                        <div class="swiper-slide avatar-sm">
                            <div class="chat-user-status-box">
                                <span><img src="/images/users/avatar-2.jpg" alt="avatar-2" class="img-fluid avatar-sm rounded-circle avatar-border" /></span>
                            </div>
                        </div>
                        <div class="swiper-slide avatar-sm">
                            <div class="chat-user-status-box">
                                <span><img src="/images/users/avatar-3.jpg" alt="avatar-3" class="img-fluid avatar-sm rounded-circle avatar-border" /></span>
                            </div>
                        </div>
                        <div class="swiper-slide avatar-sm">
                            <div class="chat-user-status-box">
                                <span><img src="/images/users/avatar-4.jpg" alt="avatar-4" class="img-fluid avatar-sm rounded-circle avatar-border" /></span>
                            </div>
                        </div>
                        <div class="swiper-slide avatar-sm">
                            <div class="chat-user-status-box">
                                <span><img src="/images/users/avatar-5.jpg" alt="avatar-5" class="img-fluid avatar-sm rounded-circle avatar-border" /></span>
                            </div>
                        </div>
                        <div class="swiper-slide avatar-sm">
                            <div class="chat-user-status-box">
                                <span><img src="/images/users/avatar-6.jpg" alt="avatar-6" class="img-fluid avatar-sm rounded-circle avatar-border" /></span>
                            </div>
                        </div>
                        <div class="swiper-slide avatar-sm">
                            <div class="chat-user-status-box">
                                <span><img src="/images/users/avatar-7.jpg" alt="avatar-7" class="img-fluid avatar-sm rounded-circle avatar-border" /></span>
                            </div>
                        </div>
                        <div class="swiper-slide avatar-sm">
                            <div class="chat-user-status-box">
                                <span><img src="/images/users/avatar-8.jpg" alt="avatar-8" class="img-fluid avatar-sm rounded-circle avatar-border" /></span>
                            </div>
                        </div>
                        <div class="swiper-slide avatar-sm">
                            <div class="chat-user-status-box">
                                <span><img src="/images/users/avatar-9.jpg" alt="avatar-9" class="img-fluid avatar-sm rounded-circle avatar-border" /></span>
                            </div>
                        </div>
                        <div class="swiper-slide avatar-sm">
                            <div class="chat-user-status-box">
                                <span><img src="/images/users/avatar-10.jpg" alt="avatar-10" class="img-fluid avatar-sm rounded-circle avatar-border" /></span>
                            </div>
                        </div>
                    </div>
                </div>

                <ul class="nav nav-tabs nav-justified nav-bordered border-top mt-2">
                    <li class="nav-item">
                        <a href="#chat-list" data-bs-toggle="tab" aria-expanded="false" class="nav-link active py-2">
                            Chat
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#group-list" data-bs-toggle="tab" aria-expanded="true" class="nav-link py-2">
                            Group
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#contact-list" data-bs-toggle="tab" aria-expanded="true" class="nav-link py-2">
                            Contact
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane show active" id="chat-list">

                        <div class="px-3 mb-3 chat-setting-height" data-simplebar>
                            <a href="javascript:void(0);" class="text-body">
                                <div class="d-flex align-items-center p-2">
                                    <div class="flex-shrink-0 position-relative">
                                        <img src="/images/users/avatar-2.jpg" class="me-2 rounded-circle" height="36" alt="avatar-2" />
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h5 class="my-0">
                                            <span class="float-end text-muted fs-13">10:20am</span>
                                            Gaston Lapierre
                                        </h5>
                                        <p class="mt-1 mb-0 fs-13 text-muted d-flex align-items-end justify-content-between">
                                            <span class="w-75">How are you today?</span>
                                            <i class="bx bx-check-double text-success"></i>
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:void(0);" class="text-body">
                                <div class="d-flex align-items-center p-2">
                                    <div class="flex-shrink-0 position-relative">
                                        <img src="/images/users/avatar-3.jpg" class="me-2 rounded-circle" height="36" alt="avatar-3" />
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h5 class="my-0">
                                            <span class="float-end text-muted fs-13">11:03am</span>
                                            Fantina LeBatelier
                                        </h5>
                                        <p class="mt-1 mb-0 fs-13 text-muted d-flex align-items-end justify-content-between">
                                            <span class="w-75">Hey! a reminder for tommorow's meeting...</span>
                                            <i class="bx bx-check-double text-success"></i>
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:void(0);" class="text-body">
                                <div class="d-flex align-items-center bg-light bg-opacity-50 p-2 rounded-1">
                                    <div class="flex-shrink-0 position-relative">
                                        <img src="/images/users/avatar-4.jpg" class="me-2 rounded-circle" height="36" alt="avatar-4" />
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h5 class="my-0">
                                            <span class="float-end text-muted fs-13">now</span>
                                            Gilbert Chicoine
                                        </h5>
                                        <p class="mt-1 mb-0 fs-13 text-muted">
                                            <span class="w-75 text-primary">typing...</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:void(0);" class="text-body">
                                <div class="d-flex align-items-center p-2">
                                    <div class="flex-shrink-0 position-relative">
                                        <img src="/images/users/avatar-5.jpg" class="me-2 rounded-circle" height="36" alt="avatar-5" />
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h5 class="my-0">
                                            <span class="float-end text-muted fs-13">Yesterday</span>
                                            Mignonette Brodeur
                                        </h5>
                                        <p class="mt-1 mb-0 fs-13 text-muted d-flex align-items-end justify-content-between">
                                            <span class="w-75">Are we going to have this week's planning meeting today?</span>
                                            <i class="bx bx-check-double text-success"></i>
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:void(0);" class="text-body">
                                <div class="d-flex align-items-center p-2">
                                    <div class="flex-shrink-0 position-relative">
                                        <img src="/images/users/avatar-6.jpg" class="me-2 rounded-circle" height="36" alt="avatar-6" />
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h5 class="my-0">
                                            <span class="float-end text-muted fs-13">Yesterday</span>
                                            Thomas Menard
                                        </h5>
                                        <p class="mt-1 mb-0 fs-13 text-muted d-flex align-items-end justify-content-between">
                                            <span class="w-75">Please check this template...</span>
                                            <i class="bx bx-check-double text-success"></i>
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:void(0);" class="text-body">
                                <div class="d-flex align-items-center p-2">
                                    <div class="flex-shrink-0 position-relative">
                                        <img src="/images/users/avatar-7.jpg" class="me-2 rounded-circle" height="36" alt="avatar-7" />
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h5 class="my-0">
                                            <span class="float-end text-muted fs-13">Yesterday</span>
                                            Melisande Lapointe
                                        </h5>
                                        <p class="mt-1 mb-0 fs-13 text-muted d-flex align-items-end justify-content-between">
                                            <span class="w-75">Are free for 10 minutes? would like to discuss something...</span>
                                            <i class="bx bx-check-double text-success"></i>
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:void(0);" class="text-body">
                                <div class="d-flex align-items-center p-2">
                                    <div class="flex-shrink-0 position-relative">
                                        <img src="/images/users/avatar-8.jpg" class="me-2 rounded-circle" height="36" alt="avatar-8" />
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h5 class="my-0">
                                            <span class="float-end text-muted fs-13">7/8/21</span>
                                            Danielle Despins
                                        </h5>
                                        <p class="mt-1 mb-0 fs-13 text-muted d-flex align-items-end justify-content-between">
                                            <span class="w-75">How are you?</span>
                                            <i class="bx bx-check-double text-success"></i>
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:void(0);" class="text-body">
                                <div class="d-flex align-items-center p-2">
                                    <div class="flex-shrink-0 position-relative">
                                        <img src="/images/users/avatar-9.jpg" class="me-2 rounded-circle" height="36" alt="avatar-9" />
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h5 class="my-0">
                                            <span class="float-end text-muted fs-13">7/8/21</span>
                                            Onfroi Pichette
                                        </h5>
                                        <p class="mt-1 mb-0 fs-13 text-muted d-flex align-items-end justify-content-between">
                                            <span class="w-75">whats going on?</span>
                                            <i class="bx bx-check-double text-success"></i>
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:void(0);" class="text-body">
                                <div class="d-flex align-items-center p-2">
                                    <div class="flex-shrink-0 position-relative">
                                        <img src="/images/users/avatar-10.jpg" class="me-2 rounded-circle" height="36" alt="avatar-10" />
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h5 class="my-0">
                                            <span class="float-end text-muted fs-13">7/8/21</span>
                                            Kari Boisvert
                                        </h5>
                                        <p class="mt-1 mb-0 fs-13 text-muted">
                                            <span class="w-75">Would you like to join us?</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="tab-pane" id="group-list">
                        <div class="px-3 mb-3 chat-setting-height" data-simplebar>

                            <div class="d-flex align-items-center position-relative mb-3">
                                <a href="javascript:void(0);" class="me-2 stretched-link rounded text-bg-primary avatar d-flex align-items-center justify-content-center fs-18">
                                    <i class="bx bxs-user"></i>
                                </a>
                                <div class="flex-grow-1">
                                    <h5 class="my-0 fs-14">New Group</h5>
                                </div>
                            </div>
                            <div class="d-flex mb-3 align-items-center position-relative">
                                <a href="javascript:void(0);" class="me-2 stretched-link rounded bg-soft-primary text-primary avatar d-flex align-items-center justify-content-center fs-18">G</a>
                                <div class="flex-grow-1 ps-1 overflow-hidden">
                                    <h5 class="fs-14 m-0">#General</h5>
                                </div>
                            </div>
                            <div class="d-flex mb-3 align-items-center position-relative">
                                <a href="javascript:void(0);" class="me-2 stretched-link rounded bg-soft-primary text-primary avatar d-flex align-items-center justify-content-center fs-18">C</a>
                                <div class="flex-grow-1 ps-1 overflow-hidden">
                                    <div class="float-end"><span class="badge badge-outline-danger">+33</span></div>
                                    <h5 class="fs-14 m-0">#Company</h5>
                                </div>
                            </div>
                            <div class="d-flex mb-3 align-items-center position-relative">
                                <a href="javascript:void(0);" class="me-2 stretched-link rounded bg-soft-primary text-primary avatar d-flex align-items-center justify-content-center fs-18">L</a>
                                <div class="flex-grow-1 ps-1 overflow-hidden">
                                    <div class="float-end"><span class="badge badge-outline-danger">+17</span></div>
                                    <h5 class="fs-14 m-0">#Life Suckers</h5>
                                </div>
                            </div>
                            <div class="d-flex mb-3 align-items-center position-relative">
                                <a href="javascript:void(0);" class="me-2 stretched-link rounded bg-soft-primary text-primary avatar d-flex align-items-center justify-content-center fs-18">D</a>
                                <div class="flex-grow-1 ps-1 overflow-hidden">
                                    <h5 class="fs-14 m-0">#Drama Club</h5>
                                </div>
                            </div>
                            <div class="d-flex mb-3 align-items-center position-relative">
                                <a href="javascript:void(0);" class="me-2 stretched-link rounded bg-soft-primary text-primary avatar d-flex align-items-center justify-content-center fs-18">U</a>
                                <div class="flex-grow-1 ps-1 overflow-hidden">
                                    <h5 class="fs-14 m-0">#Unknown Friends</h5>
                                </div>
                            </div>
                            <div class="d-flex mb-3 align-items-center position-relative">
                                <a href="javascript:void(0);" class="me-2 stretched-link rounded bg-soft-primary text-primary avatar d-flex align-items-center justify-content-center fs-18">F</a>
                                <div class="flex-grow-1 ps-1 overflow-hidden">
                                    <div class="float-end"><span class="badge badge-outline-danger">+65</span></div>
                                    <h5 class="fs-14 m-0">#Family Ties</h5>
                                </div>
                            </div>
                            <div class="d-flex mb-3 align-items-center position-relative">
                                <a href="javascript:void(0);" class="me-2 stretched-link rounded bg-soft-primary text-primary avatar d-flex align-items-center justify-content-center fs-18">2</a>
                                <div class="flex-grow-1 ps-1 overflow-hidden">
                                    <h5 class="fs-14 m-0">#2Good4U</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="contact-list">

                        <div class="px-3 mb-3 chat-setting-height" data-simplebar>
                            <div class="d-flex align-items-center position-relative py-2">
                                <a href="javascript:void(0);" class="me-2 stretched-link rounded-circle text-bg-primary avatar d-flex align-items-center justify-content-center fs-18">
                                    <i class="bx bx-group"></i>
                                </a>
                                <div class="flex-grow-1">
                                    <h5 class="my-0 fs-14">New Group</h5>
                                </div>
                            </div>
                            <div class="d-flex align-items-center position-relative py-2">
                                <a href="javascript:void(0);" class="me-2 stretched-link rounded-circle text-bg-primary avatar d-flex align-items-center justify-content-center fs-18">
                                    <i class="bx bx-user-plus"></i>
                                </a>
                                <div class="flex-grow-1">
                                    <h5 class="my-0 fs-14">New Contact</h5>
                                </div>
                            </div>
                            <div class="d-flex align-items-center position-relative py-2">
                                <a href="#!" class="stretched-link"><img src="/images/users/avatar-2.jpg" class="me-2 rounded-circle" height="36" alt="avatar-2" /></a>
                                <div class="flex-grow-1">
                                    <h5 class="my-0 fs-14">Gaston Lapierre</h5>
                                </div>
                            </div>
                            <div class="d-flex align-items-center position-relative py-2">
                                <a href="#!" class="stretched-link"><img src="/images/users/avatar-3.jpg" class="me-2 rounded-circle" height="36" alt="avatar-2" /></a>
                                <div class="flex-grow-1">
                                    <h5 class="my-0 fs-14">Fantina LeBatelier</h5>
                                    <p class="mt-1 mb-0 text-muted"><span class="w-75">** no status **</span></p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center position-relative py-2">
                                <a href="#!" class="stretched-link"><img src="/images/users/avatar-4.jpg" class="me-2 rounded-circle" height="36" alt="avatar-2" /></a>
                                <div class="flex-grow-1">
                                    <h5 class="my-0 fs-14">Gilbert Chicoine</h5>
                                    <p class="mt-1 mb-0 text-muted"><span class="w-75">|| Karma ||</span></p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center position-relative py-2">
                                <a href="#!" class="stretched-link"><img src="/images/users/avatar-5.jpg" class="me-2 rounded-circle" height="36" alt="avatar-2" /></a>
                                <div class="flex-grow-1">
                                    <h5 class="my-0 fs-14">Mignonette Brodeur</h5>
                                    <p class="mt-1 mb-0 text-muted"><span class="w-75">Hey there! I am using Chat.</span></p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center position-relative py-2">
                                <a href="#!" class="stretched-link"><img src="/images/users/avatar-6.jpg" class="me-2 rounded-circle" height="36" alt="avatar-2" /></a>
                                <div class="flex-grow-1">
                                    <h5 class="my-0 fs-14">Thomas Menard</h5>
                                    <p class="mt-1 mb-0 text-muted"><span class="w-75">TM</span></p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center position-relative py-2">
                                <a href="#!" class="stretched-link"><img src="/images/users/avatar-7.jpg" class="me-2 rounded-circle" height="36" alt="avatar-2" /></a>
                                <div class="flex-grow-1">
                                    <h5 class="my-0 fs-14">Melisande Lapointe</h5>
                                    <p class="mt-1 mb-0 text-muted"><span class="w-75">Available</span></p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center position-relative py-2">
                                <a href="#!" class="stretched-link"><img src="/images/users/avatar-8.jpg" class="me-2 rounded-circle" height="36" alt="avatar-2" /></a>
                                <div class="flex-grow-1">
                                    <h5 class="my-0 fs-14">Danielle Despins</h5>
                                    <p class="mt-1 mb-0 text-muted"><span class="w-75">Hey there! I am using Chat.</span></p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="offcanvas offcanvas-start position-absolute shadow w-100" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="user-setting" aria-labelledby="user-settingLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title text-truncate w-50" id="user-settingLabel">Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body p-0 h-100" data-simplebar>
                        <h4 class="page-title p-3 my-0">Setting</h4>

                        <div class="d-flex align-items-center px-3 pb-3 border-bottom">
                            <img src="/images/users/avatar-1.jpg" class="me-2 rounded-circle" height="36" alt="avatar-1" />
                            <div class="flex-grow-1">
                                <div class="float-end">
                                    <a href="javascript:void(0);"><i class="bx bx-qr-scan fs-20"></i></a>
                                </div>
                                <h5 class="my-0 fs-14">Gaston Lapierre</h5>
                                <p class="mt-1 mb-0 text-muted"><span class="w-75">Hey there! I am using Larkon Chat.</span></p>
                            </div>
                        </div>

                        <div class="px-3 my-3 app-chat-setting">
                            <div class="accordion custom-accordion" id="accordionSetting">
                                <div class="accordion-item border-0">
                                    <h5 class="accordion-header my-0" id="headingAccount">
                                        <button class="accordion-button px-0 pt-0 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAccount" aria-expanded="false" aria-controls="collapseAccount">
                                            <span class="d-flex align-items-center">
                                                <i class="bx bx-key me-3 fs-20"></i>
                                                <span class="flex-grow-1">
                                                    <span class="fs-14 h5 mt-0 mb-1 d-block">Account</span>
                                                    <span class="mt-1 mb-0 text-muted w-75">Privacy, security, change number</span>
                                                </span>
                                            </span>
                                        </button> <!-- end accordion button -->
                                    </h5> <!-- end accordion header -->
                                    <div id="collapseAccount" class="accordion-collapse collapse" aria-labelledby="headingAccount" data-bs-parent="#accordionSetting">
                                        <div class="accordion-body pb-0">
                                            <ul class="list-unstyled mb-0">
                                                <li class="mb-2"><a href="javascript:void(0);"><i class="bx bx-lock-alt fs-18 me-2"></i>Privacy</a></li>
                                                <li class="mb-2"><a href="javascript:void(0);"><i class="bx bx-check-Larkon fs-18 me-2"></i>Security</a></li>
                                                <li class="mb-2"><a href="javascript:void(0);"><i class="bx bx-badge-check fs-18 me-2"></i>Two-step verification</a></li>
                                                <li class="mb-2"><a href="javascript:void(0);"><i class="bx bx-arrow-from-left fs-18 me-2"></i>Change number</a></li>
                                                <li class="mb-2"><a href="javascript:void(0);"><i class="bx bx-info-circle fs-18 me-2"></i>Request account info</a></li>
                                                <li><a href="javascript:void(0);"><i class="bx bx-trash fs-18 me-2"></i>Delete my account</a></li>
                                            </ul>
                                        </div> <!-- end accordion body -->
                                    </div> <!-- end accordion collapse -->
                                </div> <!-- end accordion-item -->
                                <div class="accordion-item border-0">
                                    <h5 class="accordion-header my-0" id="headingChats">
                                        <button class="accordion-button px-0 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseChats" aria-expanded="false" aria-controls="collapseChats">
                                            <span class="d-flex align-items-center">
                                                <i class="bx bx-message-dots me-3 fs-20"></i>
                                                <span class="flex-grow-1">
                                                    <span class="fs-14 h5 mt-0 mb-1 d-block">Chats</span>
                                                    <span class="mt-1 mb-0 text-muted w-75">Theme, wallpapers, chat history</span>
                                                </span>
                                            </span>
                                        </button> <!-- end accordion button -->
                                    </h5> <!-- end accordion header -->
                                    <div id="collapseChats" class="accordion-collapse collapse" aria-labelledby="headingChats" data-bs-parent="#accordionSetting">
                                        <div class="accordion-body pb-0">
                                            <h5 class="mb-2">Display</h5>
                                            <ul class="list-unstyled mb-0">
                                                <li class="mb-2 d-flex">
                                                    <i class="bx bx-palette fs-18 me-2"></i>
                                                    <div class="flex-grow-1">
                                                        <a href="javascript:void(0);">Theme</a>
                                                        <p class="mb-0 text-muted fs-12">System default</p>
                                                    </div>
                                                </li>
                                                <li class="mb-2"><a href="javascript:void(0);"><i class="bx bx-image fs-16 me-2"></i>Wallpaper</a></li>
                                            </ul>
                                            <hr>
                                            <h5>Chat Setting</h5>
                                            <ul class="list-unstyled">
                                                <li class="mb-2 ms-2">
                                                    <div class="float-end">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" id="media" checked>
                                                        </div>
                                                    </div>
                                                    <a href="javascript:void(0);">Media Visibility</a>
                                                    <p class="mb-0 text-muted fs-12">Show Newly downloaded media in your phone's gallery</p>
                                                </li>
                                                <li class="mb-2 ms-2">
                                                    <div class="float-end">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" id="enter">
                                                        </div>
                                                    </div>
                                                    <a href="javascript:void(0);">Enter is send</a>
                                                    <p class="mb-0 text-muted fs-12">Enter key will send your message</p>
                                                </li>
                                                <li class="mb-2 ms-2">
                                                    <a href="javascript:void(0);">Font size</a>
                                                    <p class="mb-0 text-muted fs-12">small</p>
                                                </li>
                                            </ul>
                                            <hr>
                                            <ul class="list-unstyled mb-0">
                                                <li class="mb-2">
                                                    <div class="d-flex">
                                                        <i class="bx bx-text fs-16 me-2"></i>
                                                        <div class="flex-grow-1">
                                                            <a href="javascript:void(0);">App Language</a>
                                                            <p class="mb-0 text-muted fs-12">English</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="mb-2"><a href="javascript:void(0);"><i class="bx bx-cloud-upload fs-16 me-2"></i>Chat Backup</a></li>
                                                <li><a href="javascript:void(0);"><i class="bx bx-history fs-16 me-2"></i>Chat History</a></li>
                                            </ul>
                                        </div> <!-- end accordion body -->
                                    </div> <!-- end accordion collapse -->
                                </div> <!-- end accordion-item -->
                                <div class="accordion-item border-0">
                                    <h5 class="accordion-header my-0" id="headingNotification">
                                        <button class="accordion-button px-0 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNotification" aria-expanded="false" aria-controls="collapseNotification">
                                            <span class="d-flex align-items-center">
                                                <i class="bx bx-bell me-3 fs-20"></i>
                                                <span class="flex-grow-1">
                                                    <span class="fs-14 h5 mt-0 mb-1 d-block">Notification</span>
                                                    <span class="mt-1 mb-0 text-muted w-75">Message, group, call tones</span>
                                                </span>
                                            </span>
                                        </button> <!-- end accordion button -->
                                    </h5> <!-- end accordion header -->
                                    <div id="collapseNotification" class="accordion-collapse collapse" aria-labelledby="headingNotification" data-bs-parent="#accordionSetting">
                                        <div class="accordion-body pb-0">
                                            <ul class="list-unstyled mb-0">
                                                <li class="mb-2">
                                                    <div class="float-end">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" id="conversation" checked>
                                                        </div>
                                                    </div>
                                                    <a href="javascript:void(0);">Conversation Tones</a>
                                                    <p class="mb-0 text-muted fs-12">Play sound for incoming and outgoing message.</p>
                                                </li>
                                            </ul>
                                            <hr>
                                            <h5>Messages</h5>
                                            <ul class="list-unstyled mb-0">
                                                <li class="mb-2">
                                                    <a href="javascript:void(0);">Notification Tone</a>
                                                    <p class="mb-0 text-muted fs-12">Default ringtone</p>
                                                </li>
                                                <li class="mb-2">
                                                    <a href="javascript:void(0);">Vibrate</a>
                                                    <p class="mb-0 text-muted fs-12">Default</p>
                                                </li>
                                                <li class="mb-2">
                                                    <a href="javascript:void(0);">Light</a>
                                                    <p class="mb-0 text-muted fs-12">White</p>
                                                </li>
                                            </ul>
                                            <hr>
                                            <h5>Groups</h5>
                                            <ul class="list-unstyled mb-0">
                                                <li class="mb-2">
                                                    <a href="javascript:void(0);">Notification Tone</a>
                                                    <p class="mb-0 text-muted fs-12">Default ringtone</p>
                                                </li>
                                                <li class="mb-2">
                                                    <a href="javascript:void(0);">Vibrate</a>
                                                    <p class="mb-0 text-muted fs-12">Off</p>
                                                </li>
                                                <li class="mb-2">
                                                    <a href="javascript:void(0);">Light</a>
                                                    <p class="mb-0 text-muted fs-12">Dark</p>
                                                </li>
                                            </ul>
                                            <hr>
                                            <h5>Calls</h5>
                                            <ul class="list-unstyled mb-0">
                                                <li class="mb-2">
                                                    <a href="javascript:void(0);">Ringtone</a>
                                                    <p class="mb-0 text-muted fs-12">Default ringtone</p>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">Vibrate</a>
                                                    <p class="mb-0 text-muted fs-12">Default</p>
                                                </li>
                                            </ul>
                                        </div> <!-- end accordion body -->
                                    </div> <!-- end accordion collapse -->
                                </div> <!-- end accordion-item -->
                                <div class="accordion-item border-0">
                                    <h5 class="accordion-header my-0" id="headingStorage">
                                        <button class="accordion-button px-0 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseStorage" aria-expanded="false" aria-controls="collapseStorage">
                                            <span class="d-flex align-items-center">
                                                <i class="bx bx-history me-3 fs-20"></i>
                                                <span class="flex-grow-1">
                                                    <span class="fs-14 h5 mt-0 mb-1 d-block">Storage and data</span>
                                                    <span class="mt-1 mb-0 text-muted w-75">Network usage, auto download</span>
                                                </span>
                                            </span>
                                        </button> <!-- end accordion button -->
                                    </h5> <!-- end accordion header -->
                                    <div id="collapseStorage" class="accordion-collapse collapse" aria-labelledby="headingStorage" data-bs-parent="#accordionSetting">
                                        <div class="accordion-body pb-0">
                                            <ul class="list-unstyled mb-0">
                                                <li class="d-flex">
                                                    <i class="bx bx-folder fs-16 me-2"></i>
                                                    <div class="flex-grow-1">
                                                        <a href="javascript:void(0);">Manage storage</a>
                                                        <p class="mb-0 text-muted fs-12">2.4 GB</p>
                                                    </div>
                                                </li>
                                            </ul>
                                            <hr>
                                            <ul class="list-unstyled mb-0">
                                                <li class="d-flex">
                                                    <i class="bx bx-wifi fs-16 me-2"></i>
                                                    <div class="flex-grow-1">
                                                        <a href="javascript:void(0);">Network usage</a>
                                                        <p class="mb-0 text-muted fs-12">7.2 GB sent - 13.8 GB received</p>
                                                    </div>
                                                </li>
                                            </ul>
                                            <hr>
                                            <h5 class="mb-0">Media auto-download</h5>
                                            <p class="mb-0 text-muted fs-12">Voice message are always automatically downloaded</p>
                                            <ul class="list-unstyled mb-0 mt-2">
                                                <li class="mb-2">
                                                    <a href="javascript:void(0);">When using mobile data</a>
                                                    <p class="mb-0 text-muted fs-12">No media</p>
                                                </li>
                                                <li class="mb-2 ms-2">
                                                    <a href="javascript:void(0);">When connected on wi-fi</a>
                                                    <p class="mb-0 text-muted fs-12">No media</p>
                                                </li>
                                                <li class="mb-2 ms-2">
                                                    <a href="javascript:void(0);">When roaming</a>
                                                    <p class="mb-0 text-muted fs-12">No media</p>
                                                </li>
                                            </ul>
                                            <hr>
                                            <h5 class="mb-0">Media upload quality</h5>
                                            <p class="mb-0 text-muted fs-12">Choose the quality of media files to be sent</p>
                                            <ul class="list-unstyled mb-0 mt-2">
                                                <li class="ms-2">
                                                    <a href="javascript:void(0);">Photo upload quality</a>
                                                    <p class="mb-0 text-muted fs-12">Auto (recommended)</p>
                                                </li>
                                            </ul>
                                        </div> <!-- end accordion body -->
                                    </div> <!-- end accordion collapse -->
                                </div> <!-- end accordion-item -->
                                <div class="accordion-item border-0">
                                    <h5 class="accordion-header my-0" id="headingHelp">
                                        <button class="accordion-button px-0 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseHelp" aria-expanded="false" aria-controls="collapseHelp">
                                            <span class="d-flex align-items-center">
                                                <i class="bx bx-info-circle me-3 fs-20"></i>
                                                <span class="flex-grow-1">
                                                    <span class="fs-14 h5 mt-0 mb-1 d-block">Help</span>
                                                    <span class="mt-1 mb-0 text-muted w-75">Help center, contact us, privacy policy</span>
                                                </span>
                                            </span>
                                        </button> <!-- end accordion button -->
                                    </h5> <!-- end accordion header -->
                                    <div id="collapseHelp" class="accordion-collapse collapse" aria-labelledby="headingHelp" data-bs-parent="#accordionSetting">
                                        <div class="accordion-body pb-0">
                                            <ul class="list-unstyled mb-0">
                                                <li class="mb-2"><a href="javascript:void(0);"><i class="bx bx-info-circle fs-16 me-2"></i>Help center</a></li>
                                                <li class="mb-2 d-flex">
                                                    <i class="bx bxs-contact fs-16 me-2"></i>
                                                    <div class="flex-grow-1">
                                                        <a href="javascript:void(0);">Contact us</a>
                                                        <p class="mb-0 text-muted fs-12">Questions?</p>
                                                    </div>
                                                </li>
                                                <li class="mb-2"><a href="javascript:void(0);"><i class="bx bx-book-content fs-16 me-2"></i>Teams and Privacy Policy</a></li>
                                                <li><a href="javascript:void(0);"><i class="bx bx-info-circle fs-16 me-2"></i>App info</a></li>
                                            </ul>
                                        </div> <!-- end accordion body -->
                                    </div> <!-- end accordion collapse -->
                                </div> <!-- end accordion-item -->
                            </div>
                        </div>

                    </div>
                </div>

            </div> <!-- end card -->
        </div>
    </div> <!-- end col -->

    <div class="col-xxl-9">
        <div class="card position-relative overflow-hidden">

            <div class="card-header d-flex align-items-center mh-100">
                <button class="btn btn-light d-xxl-none d-flex align-items-center px-2 me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#Contactoffcanvas" aria-controls="Contactoffcanvas">
                    <i class="bx bx-menu fs-18"></i>
                </button>

                <div class="d-flex align-items-center">
                    <img src="/images/users/avatar-4.jpg" class="me-2 rounded" height="36" alt="avatar-4" />
                    <div class="d-none d-md-flex flex-column">
                        <h5 class="my-0 fs-16 fw-semibold">
                            <a data-bs-toggle="offcanvas" href="#user-profile" class="text-dark">
                                Gilbert Chicoine
                            </a>
                        </h5>
                        <p class="mb-0 text-success fw-semibold fst-italic">typing...</p>
                    </div>
                </div>

                <div class="flex-grow-1">
                    <ul class="list-inline float-end d-flex gap-3 mb-0">
                        <li class="list-inline-item fs-20 dropdown">
                            <a href="javascript: void(0);" class="text-dark" data-bs-toggle="modal" data-bs-target="#videocall">
                                <i class="bx bx-video"></i>
                            </a>
                        </li>

                        <li class="list-inline-item fs-20 dropdown">
                            <a href="javascript: void(0);" class="text-dark" data-bs-toggle="modal" data-bs-target="#voicecall">
                                <i class="bx bx-phone-call"></i>
                            </a>
                        </li>

                        <li class="list-inline-item fs-20 dropdown">
                            <a data-bs-toggle="offcanvas" href="#user-profile" class="text-dark">
                                <i class="bx bx-user"></i>
                            </a>
                        </li>

                        <li class="list-inline-item fs-20 dropdown d-none d-md-flex">
                            <a href="javascript: void(0);" class="dropdown-toggle arrow-none text-dark" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="javascript: void(0);"><i class="bx bx-user-circle me-2"></i>View Profile</a>
                                <a class="dropdown-item" href="javascript: void(0);"><i class="bx bx-music me-2"></i>Media, Links and Docs</a>
                                <a class="dropdown-item" href="javascript: void(0);"><i class="bx bx-search me-2"></i>Search</a>
                                <a class="dropdown-item" href="javascript: void(0);"><i class="bx bx-image me-2"></i>Wallpaper</a>
                                <a class="dropdown-item" href="javascript: void(0);"><i class="bx bx-right-arrow-circle me-2"></i>More</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="chat-box">
                <ul class="chat-conversation-list p-3 chatbox-height">

                    <li class="clearfix">
                        <div class="chat-conversation-text">
                            <div class="d-flex">
                                <div class="chat-ctext-wrap">
                                    <p>Hey 😊</p>
                                </div>
                                <div class="chat-conversation-actions dropdown dropend">
                                    <a href="javascript: void(0);" class="ps-1" data-bs-toggle="dropdown" aria-expanded="false"><i class='bx bx-dots-vertical-rounded fs-18'></i></a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-share me-2"></i>Reply
                                        </a>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-share-alt me-2"></i>Forward
                                        </a>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-copy me-2"></i>Copy
                                        </a>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-bookmark me-2"></i>Bookmark
                                        </a>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-star me-2"></i>Starred
                                        </a>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-info-square me-2"></i>Mark as Unread
                                        </a>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-trash me-2"></i>Delete
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <p class="text-muted fs-12 mb-0 mt-1 ms-2">8:20 am</p>
                        </div>
                    </li>
                    <li class="clearfix odd">
                        <div class="chat-conversation-text ms-0">
                            <div class="d-flex justify-content-end">
                                <div class="chat-conversation-actions dropdown dropstart">
                                    <a href="javascript: void(0);" class="pe-1" data-bs-toggle="dropdown" aria-expanded="false"><i class='bx bx-dots-vertical-rounded fs-18'></i></a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-share me-2"></i>Reply
                                        </a>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-share-alt me-2"></i>Forward
                                        </a>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-copy me-2"></i>Copy
                                        </a>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-bookmark me-2"></i>Bookmark
                                        </a>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-star me-2"></i>Starred
                                        </a>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-info-square me-2"></i>Mark as Unread
                                        </a>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-trash me-2"></i>Delete
                                        </a>
                                    </div>
                                </div>
                                <div class="chat-ctext-wrap">
                                    <p>Hi </p>
                                </div>
                            </div>
                            <p class="text-muted fs-12 mb-0 mt-1">8:20 am<i class="bx bx-check-double ms-1 text-primary"></i></p>
                        </div>
                    </li>
                    <li class="clearfix">
                        <div class="chat-conversation-text ms-0">
                            <div class="d-flex">
                                <div class="chat-ctext-wrap">
                                    <p>Hi Gaston, thanks for joining the meeting. Let's dive into our quarterly performance review.</p>
                                </div>
                                <div class="chat-conversation-actions dropdown dropend">
                                    <a href="javascript: void(0);" class="ps-1" data-bs-toggle="dropdown" aria-expanded="false"><i class='bx bx-dots-vertical-rounded fs-18'></i></a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-share me-2"></i>Reply
                                        </a>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-share-alt me-2"></i>Forward
                                        </a>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-copy me-2"></i>Copy
                                        </a>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-bookmark me-2"></i>Bookmark
                                        </a>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-star me-2"></i>Starred
                                        </a>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-info-square me-2"></i>Mark as Unread
                                        </a>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-trash me-2"></i>Delete
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="clearfix odd">
                        <div class="chat-conversation-text ms-0">
                            <div class="d-flex justify-content-end">
                                <div class="chat-conversation-actions dropdown dropstart">
                                    <a href="javascript: void(0);" class="pe-1" data-bs-toggle="dropdown" aria-expanded="false"><i class='bx bx-dots-vertical-rounded fs-18'></i></a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-share me-2"></i>Reply
                                        </a>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-share-alt me-2"></i>Forward
                                        </a>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-copy me-2"></i>Copy
                                        </a>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-bookmark me-2"></i>Bookmark
                                        </a>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-star me-2"></i>Starred
                                        </a>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-info-square me-2"></i>Mark as Unread
                                        </a>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-trash me-2"></i>Delete
                                        </a>
                                    </div>
                                </div>
                                <div class="chat-ctext-wrap">
                                    <p>Hi Gilbert, thanks for having me. I'm ready to discuss how things have been going.</p>
                                </div>
                            </div>
                            <p class="text-muted fs-12 mb-0 mt-1">8:25 am<i class="bx bx-check-double ms-1 text-primary"></i></p>
                        </div>
                    </li>
                    <li class="clearfix">
                        <div class="chat-conversation-text ms-0">
                            <div class="d-flex">
                                <div class="chat-ctext-wrap">
                                    <a href="javascript:void(0);">
                                        <img src="/images/small/img-1.jpg" alt="attachment" style="height: 84px;" class="img-thumbnail me-1">
                                    </a>
                                    <a href="javascript:void(0);">
                                        <img src="/images/small/img-2.jpg" alt="attachment" style="height: 84px;" class="img-thumbnail me-1">
                                    </a>
                                    <a href="javascript:void(0);">
                                        <img src="/images/small/img-3.jpg" alt="attachment" style="height: 84px;" class="img-thumbnail me-1">
                                    </a>
                                </div>
                                <div class="chat-conversation-actions dropdown dropend">
                                    <a href="javascript: void(0);" class="ps-1" data-bs-toggle="dropdown" aria-expanded="false"><i class='bx bx-dots-vertical-rounded fs-18'></i></a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-share me-2"></i>Reply
                                        </a>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-share-alt me-2"></i>Forward
                                        </a>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-copy me-2"></i>Copy
                                        </a>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-bookmark me-2"></i>Bookmark
                                        </a>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-star me-2"></i>Starred
                                        </a>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-info-square me-2"></i>Mark as Unread
                                        </a>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-trash me-2"></i>Delete
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <p class="text-muted fs-12 mb-0 mt-1 ms-2">8:26 am</p>
                        </div>
                    </li>

                    <li class="clearfix odd">
                        <div class="chat-conversation-text ms-0">
                            <div class="d-flex justify-content-end">
                                <div class="chat-conversation-actions dropdown dropstart">
                                    <a href="javascript: void(0);" class="pe-1" data-bs-toggle="dropdown" aria-expanded="false"><i class='bx bx-dots-vertical-rounded fs-18'></i></a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-share me-2"></i>Reply
                                        </a>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-share-alt me-2"></i>Forward
                                        </a>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-copy me-2"></i>Copy
                                        </a>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-bookmark me-2"></i>Bookmark
                                        </a>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-star me-2"></i>Starred
                                        </a>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-info-square me-2"></i>Mark as Unread
                                        </a>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-trash me-2"></i>Delete
                                        </a>
                                    </div>
                                </div>
                                <div class="chat-ctext-wrap">
                                    <p>I appreciate your honesty. Can you elaborate on some of those challenges? I want to understand how we can support you better in the future.</p>
                                </div>
                            </div>
                            <p class="text-muted fs-12 mb-0 mt-1">8:27 am<i class="bx bx-check-double ms-1 text-primary"></i></p>
                        </div>
                    </li>

                    <li class="clearfix">
                        <div class="chat-conversation-text ms-0">
                            <div class="d-flex">
                                <div class="chat-ctext-wrap">
                                    <p>Thanks, Emily. I appreciate your support. Overall, I'm optimistic about our team's performance and looking forward to tackling new challenges in the next quarter.</p>
                                </div>
                                <div class="chat-conversation-actions dropdown dropend">
                                    <a href="javascript: void(0);" class="ps-1" data-bs-toggle="dropdown" aria-expanded="false"><i class='bx bx-dots-vertical-rounded fs-18'></i></a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-share me-2"></i>Reply
                                        </a>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-share-alt me-2"></i>Forward
                                        </a>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-copy me-2"></i>Copy
                                        </a>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-bookmark me-2"></i>Bookmark
                                        </a>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-star me-2"></i>Starred
                                        </a>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-info-square me-2"></i>Mark as Unread
                                        </a>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <i class="bx bx-trash me-2"></i>Delete
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <p class="text-muted fs-12 mb-0 mt-1">8:29 am</p>
                        </div>
                    </li>
                </ul> <!-- end chat-conversation-list -->
                <div class="bg-light bg-opacity-50 p-2">
                    <form class="needs-validation" name="chat-form" id="chat-form">
                        <div class="row align-items-center">
                            <div class="col mb-2 mb-sm-0 d-flex">
                                <div class="input-group">
                                    <a href="javascript: void(0);" class="btn btn-sm btn-light d-flex align-items-center input-group-text"><i class="bx bx-smile fs-18"></i></a>
                                    <input type="text" class="form-control border-0" placeholder="Enter your message">
                                </div>
                            </div>
                            <div class="col-sm-auto">
                                <div class="">
                                    <div class="btn-group btn-toolbar">
                                        <a href="javascript: void(0);" class="btn btn-sm btn-light"><i class="bx bx-paperclip fs-18"></i></a>
                                        <a href="javascript: void(0);" class="btn btn-sm btn-light"><i class="bx bx-video fs-18"></i></a>
                                        <button type="submit" class="btn btn-sm btn-primary chat-send"><i class="bx bx-send fs-18"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- video call Modal -->
            <div class="modal fade" id="videocall" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content video-call">

                        <div class="modal-header border-0 mb-5 justify-content-end">
                            <div class="video-call-head">
                                <img src="/images/users/avatar-4.jpg" class="rounded" alt="avatar-4" />
                            </div>
                        </div>

                        <div class="modal-body">
                            <div class="video-call-action text-center pt-4 pb-2">
                                <ul class="list-inline">
                                    <li class="list-inline-item avatar-sm fw-bold me-2">
                                        <a href="javascript: void(0);" class="avatar-title rounded-circle bg-soft-light text-white fs-16">
                                            <i class="bx bx-microphone-off"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item avatar fw-bold me-2">
                                        <a href="javascript: void(0);" class="avatar-title rounded-circle bg-danger text-white fs-18">
                                            <i class="bx bx-video-off" data-bs-dismiss="modal"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item avatar-sm fw-bold">
                                        <a href="javascript: void(0);" class="avatar-title rounded-circle bg-soft-light text-white fs-16">
                                            <i class="bx bx-volume-full"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- voice call modal -->
            <div class="modal fade" id="voicecall" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content voice-call">

                        <div class="modal-header border-0 mt-5 justify-content-center">
                            <div class="voice-call-head">
                                <img src="/images/users/avatar-4.jpg" class="rounded-circle" alt="avatar-4" />
                            </div>
                        </div>

                        <div class="modal-body pt-0 text-center">
                            <h5>Gaston Lapierre</h5>
                            <p class="mb-5">Calling...</p>
                            <div class="voice-call-action pt-4 pb-2">
                                <ul class="list-inline">
                                    <li class="list-inline-item avatar-sm fw-bold me-2">
                                        <a href="javascript: void(0);" class="avatar-title rounded-circle bg-soft-secondary text-dark fs-16">
                                            <i class="bx bx-microphone-off"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item avatar fw-bold me-2" data-bs-dismiss="modal">
                                        <a href="javascript: void(0);" class="avatar-title rounded-circle bg-danger text-white fs-18">
                                            <i class="bx bx-phone-off"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item avatar-sm fw-bold">
                                        <a href="javascript: void(0);" class="avatar-title rounded-circle bg-soft-secondary text-dark fs-16">
                                            <i class="bx bx-volume-full"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Profile Start -->
            <div class="offcanvas offcanvas-end position-absolute shadow border-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="user-profile" aria-labelledby="user-profileLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title text-truncate w-50" id="user-profileLabel">Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body p-0 h-100" data-simplebar>
                    <div class="p-3">
                        <div class="text-center">
                            <img src="/images/users/avatar-4.jpg" alt="shreyu" class="img-thumbnail avatar-lg rounded-circle mb-1">
                            <h4>Gilbert Chicoine</h4>
                            <button class="btn btn-primary btn-sm mt-1"><i class="bi bi-envelope me-1"></i>Send Email</button>
                            <p class="text-muted mt-2 fs-14">Last Interacted: <strong class="text-success">Online</strong></p>
                        </div>

                        <div class="mt-3">
                            <hr>


                            <p class="mt-3 mb-1"><strong><i class="bi bi-phone"></i> Phone Number:</strong></p>
                            <p>+1 456 9595 9594</p>

                            <p class="mt-3 mb-1"><strong><i class="bi bi-geo-alt"></i> Location:</strong></p>
                            <p>California, USA</p>

                            <p class="mt-3 mb-1"><strong><i class="bi bi-globe"></i> Languages:</strong></p>
                            <p>English, German, Spanish</p>

                            <p class="mt-3 mb-2"><strong><i class="bi bi-people"></i> Groups:</strong></p>
                            <p class="mb-0">
                                <span class="badge badge-soft-success p-1 fs-14">Work</span>
                                <span class="badge badge-soft-primary p-1 fs-14">Friends</span>
                            </p>
                        </div>


                        <h5 class="mt-3">
                            <a href="javascript:void(0);" class="my-0">
                                <span class="float-end">See All</span>
                                Shared Photoes
                            </a>
                        </h5>
                        <div class="row gx-1 pt-2">
                            <div class="col-4">
                                <a href="javascript:void(0);">
                                    <img src="/images/small/img-1.jpg" alt="img-1" class="img-fluid rounded">
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="javascript:void(0);">
                                    <img src="/images/small/img-2.jpg" alt="img-2" class="img-fluid rounded">
                                </a>
                            </div>
                            <div class="col-4">
                                <div class="position-relative overflow-hidden rounded">
                                    <a href="javascript:void(0);">
                                        <img src="/images/small/img-3.jpg" alt="img-3" class="img-fluid rounded">
                                        <div class="bg-overlay bg-dark"></div>
                                        <h3 class="position-absolute top-50 start-50 translate-middle my-0 text-white">+3</h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Profile End -->

        </div> <!-- end card -->
    </div> <!-- end col -->
</div> <!-- end row -->

@endsection

@section('script-bottom')
@vite(['resources/js/pages/app-chat.js'])
@endsection