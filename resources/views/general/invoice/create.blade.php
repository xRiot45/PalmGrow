@extends('layouts.vertical', ['title' => 'Invoices Create'])

@section('css')
@vite(['node_modules/flatpickr/dist/flatpickr.min.css'])
@endsection

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-body">
                <!-- Logo & title -->

                <div class="pb-3 mb-4 position-relative border-bottom">
                    <div class="row justify-content-between">
                        <div class="col-lg-5">
                            <div class="">
                                <div class="w-50 auth-logo border border-primary bg-light-subtle p-2 rounded" style="border-style: dashed !important;">
                                    <div class="profile-photo-edit">
                                        <input id="profile-img-file-input" type="file" class="profile-img-file-input">
                                        <label for="profile-img-file-input" class="profile-photo-edit avatar-xs"><img src="/images/logo-dark.png" class="logo-dark me-1 user-profile-image" alt="user-profile-image" height="24"></label>
                                    </div>
                                </div>
                                <div class="mt-5 pt-2">
                                    <form>
                                        <div class="mb-3">
                                            <label for="sender-name" class="form-label text-dark">Sender Name</label>
                                            <input type="text" id="sender-name" class="form-control" placeholder="First name">
                                        </div>
                                    </form>
                                    <form>
                                        <div class="mb-3">
                                            <label for="sender-address" class="form-label text-dark">Sender Full Address</label>
                                            <textarea class="form-control" id="sender-address" rows="3" placeholder="Enter address"></textarea>
                                        </div>
                                    </form>
                                    <form>
                                        <div class="mb-3">
                                            <label for="sender-number" class="form-label text-dark">Phone number</label>
                                            <input type="number" id="sender-number" class="form-control" placeholder="Number">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <form>
                                <div class="mb-3">
                                    <label for="invoice-no" class="form-label text-dark">Invoice Number :</label>
                                    <input type="text" id="invoice-no" class="form-control" placeholder="#INV-****" value="#INV-0758267/90">
                                </div>
                            </form>
                            <form>
                                <div class="mb-3">
                                    <label for="schedule-date" class="form-label text-dark">Issue Date :</label>
                                    <input type="text" id="schedule-date" class="form-control flatpickr-input active" placeholder="dd-mm-yyyy" readonly="readonly">
                                </div>
                            </form>
                            <form>
                                <div class="mb-3">
                                    <label for="due-date" class="form-label text-dark">Due Date :</label>
                                    <input type="text" id="due-date" class="form-control flatpickr-input active" placeholder="dd-mm-yyyy" readonly="readonly">
                                </div>
                            </form>
                            <form>
                                <label for="product-price" class="form-label text-dark">Amount :</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text fs-20 bg-light text-dark"><i class="bx bx-dollar"></i></span>
                                    <input type="number" id="product-price" class="form-control" placeholder="000">
                                </div>
                            </form>
                            <form>
                                <label for="status" class="form-label text-dark">Status :</label>
                                <select class="form-select" id="status" aria-label="Default select example">
                                    <option selected>Paid</option>
                                    <option value="Cancel">Cancel</option>
                                    <option value="Pending">Pending</option>
                                </select>
                            </form>
                        </div>
                    </div>

                </div>

                <div class="row justify-content-between">
                    <div class="col-lg-5">
                        <h4 class="mb-3">Issue From :</h4>
                        <form>
                            <div class="mb-2">
                                <input type="text" id="buyer-from" class="form-control" placeholder="First name">
                            </div>
                        </form>
                        <form>
                            <div class="mb-2">
                                <textarea class="form-control" id="buyer-address" rows="3" placeholder="Enter address"></textarea>
                            </div>
                        </form>
                        <form>
                            <div class="mb-2">
                                <input type="number" id="buyer-number" class="form-control" placeholder="Number">
                            </div>
                        </form>
                        <form>
                            <div class="mb-2">
                                <input type="email" id="buyer-email" class="form-control" placeholder="Email Address">
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-5">
                        <h4 class="mb-3">Issue For :</h4>
                        <form>
                            <div class="mb-2">
                                <input type="text" id="issuer-from" class="form-control" placeholder="First name">
                            </div>
                        </form>
                        <form>
                            <div class="mb-2">
                                <textarea class="form-control" id="issuer-address" rows="3" placeholder="Enter address"></textarea>
                            </div>
                        </form>
                        <form>
                            <div class="mb-2">
                                <input type="number" id="issuer-number" class="form-control" placeholder="Number">
                            </div>
                        </form>
                        <form>
                            <div class="mb-2">
                                <input type="email" id="issuer-email" class="form-control" placeholder="Email Address">
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="table-responsive table-borderless text-nowrap table-centered">
                            <table class="table mb-0">
                                <thead class="bg-light bg-opacity-50">
                                    <tr>
                                        <th class="border-0 py-2">Product Name</th>
                                        <th class="border-0 py-2">Quantity</th>
                                        <th class="border-0 py-2">Price</th>
                                        <th class="border-0 py-2">Tax</th>
                                        <th class="border-0 py-2">Total</th>
                                    </tr>
                                </thead> <!-- end thead -->
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex gap-3">
                                                <div class="auth-logo border-0 rounded" style="border-style: dashed !important;">
                                                    <div class="profile-photo-edit">
                                                        <input id="profile-img-file-input1" type="file" class="profile-img-file-input1">
                                                        <label for="profile-img-file-input1" class="profile-photo-edit avatar bg-light rounded"><img src="" alt="" class="me-1 user-profile-image1 img-fluid" alt="user-profile-image1"></label>
                                                    </div>
                                                </div>
                                                <div class="w-75">
                                                    <form>
                                                        <div class="mb-3">
                                                            <input type="text" id="product-name" class="form-control" placeholder="Product Name">
                                                        </div>
                                                    </form>
                                                    <form>
                                                        <div class="mb-3">
                                                            <input type="text" id="product-name" class="form-control" placeholder="Product Size">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="quantity">
                                                <div class="input-step border bg-body-secondary p-1 rounded d-inline-flex overflow-visible">
                                                    <button type="button" class="minus bg-light text-dark border-0 rounded-1 fs-20 lh-1 h-100">-</button>
                                                    <input type="number" class="text-dark text-center border-0 bg-body-secondary rounded h-100" value="1" min="0" max="100" readonly="">
                                                    <button type="button" class="plus bg-light text-dark border-0 rounded-1 fs-20 lh-1 h-100">+</button>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <form>
                                                <div class="input-group">
                                                    <span class="input-group-text fs-20 bg-light text-dark"><i class="bx bx-dollar"></i></span>
                                                    <input type="number" id="product-price-table" class="form-control" placeholder="000">
                                                </div>
                                            </form>
                                        </td>
                                        <td>
                                            <form>
                                                <div class="input-group">
                                                    <span class="input-group-text fs-20 bg-light text-dark"><i class="bx bx-dollar"></i></span>
                                                    <input type="number" id="product-tax" class="form-control" placeholder="000">
                                                </div>
                                            </form>
                                        </td>
                                        <td class="">
                                            <form>
                                                <div class="input-group">
                                                    <span class="input-group-text fs-20 bg-light text-dark"><i class="bx bx-dollar"></i></span>
                                                    <input type="number" id="total" class="form-control" placeholder="000">
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody> <!-- end tbody -->

                            </table> <!-- end table -->
                        </div> <!-- end table responsive -->
                        <div class="text-end border-top">
                            <div class="pt-3">
                                <a href="#!" class="btn btn-primary">Clear Product</a>
                                <a href="#!" class="btn btn-outline-primary">Add More</a>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>

                <div class="row justify-content-end">
                    <div class="col-lg-4">
                        <label for="sub-total" class="form-label text-dark">Sub Total :</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text fs-20 bg-light text-dark"><i class="bx bx-dollar"></i></span>
                            <input type="number" id="sub-total" class="form-control" placeholder="000">
                        </div>
                        <label for="discount-price" class="form-label text-dark">Discount :</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text fs-20 bg-light text-dark"><i class="bx bx-dollar"></i></span>
                            <input type="number" id="discount-price" class="form-control" placeholder="000">
                        </div>
                        <label for="discount-price" class="form-label text-dark">Estimated Tax (15.5%) :</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text fs-20 bg-light text-dark"><i class="bx bx-dollar"></i></span>
                            <input type="number" id="discount-price" class="form-control" placeholder="000">
                        </div>
                        <div class="border-top">
                            <label for="grand-total" class="form-label text-dark pt-3">Grand Amount :</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text fs-20 bg-light text-dark"><i class="bx bx-dollar"></i></span>
                                <input type="number" id="grand-total" class="form-control" placeholder="000">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-12">
                        <div class="alert alert-danger alert-icon p-2" role="alert">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm rounded bg-danger d-flex justify-content-center align-items-center fs-18 me-2 flex-shrink-0">
                                    <i class="bx bx-info-circle text-white"></i>
                                </div>
                                <div class="flex-grow-1">
                                    All accounts are to be paid within 7 days from receipt of invoice. To be paid by cheque or credit card or direct payment online. If account is not paid within 7 days the credits details supplied as confirmation of work undertaken will be charged the agreed quoted fee noted above.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script-bottom')
@vite(['resources/js/pages/invoice-add.js'])
@endsection