@extends('layouts.vertical', ['title' => 'Invoice Details'])

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <!-- Logo & title -->
                <div class="clearfix pb-3 bg-info-subtle p-lg-3 p-2 m-n2 rounded position-relative">
                    <div class="float-sm-start">
                        <div class="auth-logo">
                            <img class="logo-dark me-1" src="/images/logo-dark.png" alt="logo-dark" height="24" />
                        </div>
                        <div class="mt-4">
                            <h4>Larkon Admin.</h4>
                            <address class="mt-3 mb-0">
                                1729 Bangor St,<br>
                                Houlton, ME, 04730 , United States <br>
                                <abbr title="Phone">Phone:</abbr> +1(142)-532-9109
                            </address>
                        </div>
                    </div>
                    <div class="float-sm-end">
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <tbody>
                                    <tr>
                                        <td class="p-0 pe-5 py-1">
                                            <p class="mb-0 text-dark fw-semibold"> Invoice : </p>
                                        </td>
                                        <td class="text-end text-dark fw-semibold px-0 py-1">#INV-0758267/90</td>
                                    </tr>
                                    <tr>
                                        <td class="p-0 pe-5 py-1">
                                            <p class="mb-0">Issue Date: </p>
                                        </td>
                                        <td class="text-end text-dark fw-medium px-0 py-1">23 April 2024</td>
                                    </tr>
                                    <tr>
                                        <td class="p-0 pe-5 py-1">
                                            <p class="mb-0">Due Date : </p>
                                        </td>
                                        <td class="text-end text-dark fw-medium px-0 py-1">26 April 2024</td>
                                    </tr>
                                    <tr>
                                        <td class="p-0 pe-5 py-1">
                                            <p class="mb-0">Amount : </p>
                                        </td>
                                        <td class="text-end text-dark fw-medium px-0 py-1">$737.00</td>
                                    </tr>
                                    <tr>
                                        <td class="p-0 pe-5 py-1">
                                            <p class="mb-0">Status : </p>
                                        </td>
                                        <td class="text-end px-0 py-1"><span class="badge bg-success text-white  px-2 py-1 fs-13">Paid</span></td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="position-absolute top-100 start-50 translate-middle">
                        <img src="/images/check-2.png" alt="" class="img-fluid">
                    </div>
                </div>

                <div class="clearfix pb-3 mt-4">
                    <div class="float-sm-start">
                        <div class="">
                            <h4 class="card-title">Issue From :</h4>
                            <div class="mt-3">
                                <h4>Larkon Admin.INC</h4>
                                <p class="mb-2">2437 Romano Street Cambridge, MA 02141</p>
                                <p class="mb-2"><span class="text-decoration-underline">Phone :</span> +(31)781-417-2004</p>
                                <p class="mb-2"><span class="text-decoration-underline">Email :</span> JulianeKuhn@jourrapide.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="float-sm-end">
                        <div class="">
                            <h4 class="card-title">Issue For :</h4>
                            <div class="mt-3">
                                <h4>Gaston Lapierre</h4>
                                <p class="mb-2">1344 Hershell Hollow Road WA 98168 , USA</p>
                                <p class="mb-2"><span class="text-decoration-underline">Phone :</span> +(123) 732-760-5760</p>
                                <p class="mb-2"><span class="text-decoration-underline">Email :</span> hello@dundermuffilin.com</p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive table-borderless text-nowrap table-centered">
                            <table class="table mb-0">
                                <thead class="bg-light bg-opacity-50">
                                    <tr>
                                        <th class="border-0 py-2">Product Name</th>
                                        <th class="border-0 py-2">Quantity</th>
                                        <th class="border-0 py-2">Price</th>
                                        <th class="border-0 py-2">Tax</th>
                                        <th class="text-end border-0 py-2">Total</th>
                                    </tr>
                                </thead> <!-- end thead -->
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="rounded bg-light avatar d-flex align-items-center justify-content-center">
                                                    <img src="/images/product/p-1.png" alt="" class="avatar">
                                                </div>
                                                <div>
                                                    <a href="#!" class="text-dark fw-medium fs-15">Men Black Slim Fit T-shirt</a>
                                                    <p class="text-muted mb-0 mt-1 fs-13"><span>Size : </span>M</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>1</td>
                                        <td>$80.00</td>
                                        <td>$3.00</td>
                                        <td class="text-end">$83.00</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="rounded bg-light avatar d-flex align-items-center justify-content-center">
                                                    <img src="/images/product/p-5.png" alt="" class="avatar">
                                                </div>
                                                <div>
                                                    <a href="#!" class="text-dark fw-medium fs-15">Dark Green Cargo Pent</a>
                                                    <p class="text-muted mb-0 mt-1 fs-13"><span>Size : </span>M</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>3</td>
                                        <td>$110.00</td>
                                        <td>$4.00</td>
                                        <td class="text-end">$330.00</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="rounded bg-light avatar d-flex align-items-center justify-content-center">
                                                    <img src="/images/product/p-8.png" alt="" class="avatar">
                                                </div>
                                                <div>
                                                    <a href="#!" class="text-dark fw-medium fs-15">Men Dark Brown Wallet</a>
                                                    <p class="text-muted mb-0 mt-1 fs-13"><span>Size : </span>S</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>1</td>
                                        <td>$132.00</td>
                                        <td>$5.00</td>
                                        <td class="text-end">$137.00</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="rounded bg-light avatar d-flex align-items-center justify-content-center">
                                                    <img src="/images/product/p-10.png" alt="" class="avatar">
                                                </div>
                                                <div>
                                                    <a href="#!" class="text-dark fw-medium fs-15">Kid's Yellow T-shirt</a>
                                                    <p class="text-muted mb-0 mt-1 fs-13"><span>Size : </span>S</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>2</td>
                                        <td>$110.00</td>
                                        <td>$5.00</td>
                                        <td class="text-end">$223.00</td>
                                    </tr>
                                </tbody> <!-- end tbody -->
                            </table> <!-- end table -->
                        </div> <!-- end table responsive -->
                    </div> <!-- end col -->
                </div> <!-- end row -->

                <div class="row justify-content-end">
                    <div class="col-lg-5 col-6">
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <tbody>
                                    <tr class="">
                                        <td class="text-end p-0 pe-5 py-2">
                                            <p class="mb-0"> Sub Total : </p>
                                        </td>
                                        <td class="text-end text-dark fw-medium  py-2">$777.00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-end p-0 pe-5 py-2">
                                            <p class="mb-0">Discount : </p>
                                        </td>
                                        <td class="text-end text-dark fw-medium  py-2">-$60.00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-end p-0 pe-5 py-2">
                                            <p class="mb-0">Estimated Tax (15.5%) : </p>
                                        </td>
                                        <td class="text-end text-dark fw-medium  py-2">$20.00</td>
                                    </tr>
                                    <tr class="border-top">
                                        <td class="text-end p-0 pe-5 py-2">
                                            <p class="mb-0 text-dark fw-semibold">Grand Amount : </p>
                                        </td>
                                        <td class="text-end text-dark fw-semibold  py-2">$737.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

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

                <div class="mt-3 mb-1">
                    <div class="text-end d-print-none">
                        <a href="javascript:window.print()" class="btn btn-info width-xl">Print</a>
                        <a href="javascript:void(0);" class="btn btn-outline-primary width-xl">Submit</a>
                    </div>
                </div>

            </div> <!-- end card body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div> <!-- end row -->

@endsection