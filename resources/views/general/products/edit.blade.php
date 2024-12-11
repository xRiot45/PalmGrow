@extends('layouts.vertical', ['title' => 'Product Edit'])

@section('css')
@vite(['node_modules/choices.js/public/assets/styles/choices.min.css'])
@endsection

@section('content')

<div class="row">
    <div class="col-xl-3 col-lg-4">
        <div class="card">
            <div class="card-body">
                <img src="/images/product/p-1.png" alt="" class="img-fluid rounded bg-light">
                <div class="mt-3">
                    <h4>Men Black Slim Fit T-shirt <span class="fs-14 text-muted ms-1">(Fashion)</span></h4>
                    <h5 class="text-dark fw-medium mt-3">Price :</h5>
                    <h4 class="fw-semibold text-dark mt-2 d-flex align-items-center gap-2">
                        <span class="text-muted text-decoration-line-through">$100</span> $80 <small class="text-muted"> (30% Off)</small>
                    </h4>
                    <div class="mt-3">
                        <h5 class="text-dark fw-medium">Size :</h5>
                        <div class="d-flex flex-wrap gap-2" role="group" aria-label="Basic checkbox toggle button group">
                            <input type="checkbox" class="btn-check" id="size-s">
                            <label class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center" for="size-s">S</label>

                            <input type="checkbox" class="btn-check" id="size-m" checked>
                            <label class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center" for="size-m">M</label>

                            <input type="checkbox" class="btn-check" id="size-xl">
                            <label class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center" for="size-xl">Xl</label>

                            <input type="checkbox" class="btn-check" id="size-xxl">
                            <label class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center" for="size-xxl">XXL</label>

                        </div>
                    </div>
                    <div class="mt-3">
                        <h5 class="text-dark fw-medium">Colors :</h5>
                        <div class="d-flex flex-wrap gap-2" role="group" aria-label="Basic checkbox toggle button group">
                            <input type="checkbox" class="btn-check" id="color-dark">
                            <label class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center" for="color-dark"> <i class="bx bxs-circle fs-18 text-dark"></i></label>

                            <input type="checkbox" class="btn-check" id="color-yellow">
                            <label class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center" for="color-yellow"> <i class="bx bxs-circle fs-18 text-warning"></i></label>

                            <input type="checkbox" class="btn-check" id="color-white">
                            <label class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center" for="color-white"> <i class="bx bxs-circle fs-18 text-white"></i></label>

                            <input type="checkbox" class="btn-check" id="color-red">
                            <label class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center" for="color-red"> <i class="bx bxs-circle fs-18 text-danger"></i></label>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-9 col-lg-8 ">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add Product Photo</h4>
            </div>
            <div class="card-body">
                <div class="dropzone bg-light-subtle py-5">
                    <div class="fallback">
                        <input name="file" type="file" multiple="multiple">
                    </div>
                    <div class="dz-message needsclick">
                        <i class="bx bx-cloud-upload fs-48 text-primary"></i>
                        <h3 class="mt-4">Drop your images here, or <span class="text-primary">click to browse</span></h3>
                        <span class="text-muted fs-13">
                            1600 x 1200 (4:3) recommended. PNG, JPG and GIF files are allowed
                        </span>
                    </div>
                </div>

                <ul class="list-unstyled mb-0" id="dropzone-preview">
                    <li class="mt-2" id="dropzone-preview-list">
                        <!-- This is used as the file preview template -->
                        <div class="border rounded">
                            <div class="d-flex p-2">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-sm bg-light rounded">
                                        <img data-dz-thumbnail class="img-fluid rounded d-block" src="#" alt="Dropzone-Image" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="pt-1">
                                        <h5 class="fs-14 mb-1" data-dz-name>&</h5>
                                        <p class="fs-13 text-muted mb-0" data-dz-size></p>
                                        <strong class="error text-primary" data-dz-errormessage></strong>
                                    </div>
                                </div>
                                <div class="flex-shrink-0 ms-3">
                                    <button data-dz-remove class="btn btn-sm btn-primary">Delete</button>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <!-- end dropzon-preview -->
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Product Information</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form>
                            <div class="mb-3">
                                <label for="product-name" class="form-label">Product Name</label>
                                <input type="text" id="product-name" class="form-control" placeholder="Items Name" value="Men Black Slim Fit T-shirt">
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6">
                        <form>
                            <label for="product-categories" class="form-label">Product Categories</label>
                            <select class="form-control" id="product-categories" data-choices data-choices-groups data-placeholder="Select Categories" name="choices-single-groups">
                                <option value="">Choose a categories</option>
                                <option value="Fashion" selected>Fashion</option>
                                <option value="Electronics">Electronics</option>
                                <option value="Footwear">Footwear</option>
                                <option value="Sportswear">Sportswear</option>
                                <option value="Watches">Watches</option>
                                <option value="Furniture">Furniture</option>
                                <option value="Appliances">Appliances</option>
                                <option value="Headphones">Headphones</option>
                                <option value="Other Accessories">Other Accessories</option>
                            </select>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <form>
                            <div class="mb-3">
                                <label for="product-brand" class="form-label">Brand</label>
                                <input type="text" id="product-brand" class="form-control" placeholder="Brand Name" value="Larkon Fashion">
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <form>
                            <div class="mb-3">
                                <label for="product-weight" class="form-label">Weight</label>
                                <input type="text" id="product-weight" class="form-control" placeholder="In gm & kg" value="300gm">
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <form>
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-control" id="gender" data-choices data-choices-groups data-placeholder="Select Gender">
                                <option value="">Select Gender</option>
                                <option value="Men" selected>Men</option>
                                <option value="Women">Women</option>
                                <option value="Other">Other</option>
                            </select>
                        </form>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-4">
                        <div class="mt-3">
                            <h5 class="text-dark fw-medium">Size :</h5>
                            <div class="d-flex flex-wrap gap-2" role="group" aria-label="Basic checkbox toggle button group">
                                <input type="checkbox" class="btn-check" id="size-xs1">
                                <label class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center" for="size-xs1">XS</label>

                                <input type="checkbox" class="btn-check" id="size-s1" checked>
                                <label class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center" for="size-s1">S</label>

                                <input type="checkbox" class="btn-check" id="size-m1" checked>
                                <label class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center" for="size-m1">M</label>

                                <input type="checkbox" class="btn-check" id="size-xl1" checked>
                                <label class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center" for="size-xl1">Xl</label>

                                <input type="checkbox" class="btn-check" id="size-xxl1" checked>
                                <label class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center" for="size-xxl1">XXL</label>
                                <input type="checkbox" class="btn-check" id="size-3xl1">
                                <label class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center" for="size-3xl1">3XL</label>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="mt-3">
                            <h5 class="text-dark fw-medium">Colors :</h5>
                            <div class="d-flex flex-wrap gap-2" role="group" aria-label="Basic checkbox toggle button group">
                                <input type="checkbox" class="btn-check" id="color-dark1" checked>
                                <label class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center" for="color-dark1"> <i class="bx bxs-circle fs-18 text-dark"></i></label>

                                <input type="checkbox" class="btn-check" id="color-yellow1" checked>
                                <label class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center" for="color-yellow1"> <i class="bx bxs-circle fs-18 text-warning"></i></label>

                                <input type="checkbox" class="btn-check" id="color-white1" checked>
                                <label class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center" for="color-white1"> <i class="bx bxs-circle fs-18 text-white"></i></label>

                                <input type="checkbox" class="btn-check" id="color-red1" checked>
                                <label class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center" for="color-red1"> <i class="bx bxs-circle fs-18 text-primary"></i></label>

                                <input type="checkbox" class="btn-check" id="color-green1">
                                <label class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center" for="color-green1"> <i class="bx bxs-circle fs-18 text-success"></i></label>

                                <input type="checkbox" class="btn-check" id="color-blue1">
                                <label class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center" for="color-blue1"> <i class="bx bxs-circle fs-18 text-danger"></i></label>

                                <input type="checkbox" class="btn-check" id="color-sky1">
                                <label class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center" for="color-sky1"> <i class="bx bxs-circle fs-18 text-info"></i></label>

                                <input type="checkbox" class="btn-check" id="color-gray1">
                                <label class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center" for="color-gray1"> <i class="bx bxs-circle fs-18 text-secondary"></i></label>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control bg-light-subtle" id="description" rows="7" placeholder="Short description about the product">Top in sweatshirt fabric made from a cotton blend with a soft brushed inside. Relaxed fit with dropped shoulders, long sleeves and ribbing around the neckline, cuffs and hem. Small metal text applique.</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <form>
                            <div class="mb-3">
                                <label for="product-id" class="form-label">Tag Number</label>
                                <input type="number" id="product-id" class="form-control" placeholder="#******" value="36294007">
                            </div>

                        </form>
                    </div>
                    <div class="col-lg-4">
                        <form>
                            <div class="mb-3">
                                <label for="product-stock" class="form-label">Stock</label>
                                <input type="number" id="product-stock" class="form-control" placeholder="Quantity" value="465">
                            </div>

                        </form>
                    </div>
                    <div class="col-lg-4">
                        <label for="product-stock" class="form-label">Tag</label>
                        <select class="form-control" id="choices-multiple-remove-button" data-choices data-choices-removeItem name="choices-multiple-remove-button" multiple>
                            <option value="Fashion" selected>Fashion</option>
                            <option value="Electronics">Electronics</option>
                            <option value="Watches">Watches</option>
                            <option value="Headphones">Headphones</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Pricing Details</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <form>
                            <label for="product-price" class="form-label">Price</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text fs-20"><i class='bx bx-dollar'></i></span>
                                <input type="number" id="product-price" class="form-control" placeholder="000" value="80">
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <form>
                            <label for="product-discount" class="form-label">Discount</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text fs-20"><i class='bx bxs-discount'></i></span>
                                <input type="number" id="product-discount" class="form-control" placeholder="000" value="30">
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <form>
                            <label for="product-tex" class="form-label">Tex</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text fs-20"><i class='bx bxs-file-txt'></i></span>
                                <input type="number" id="product-tex" class="form-control" placeholder="000" value="3">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-3 bg-light mb-3 rounded">
            <div class="row justify-content-end g-2">
                <div class="col-lg-2">
                    <a href="#!" class="btn btn-outline-secondary w-100">Reset</a>
                </div>
                <div class="col-lg-2">
                    <a href="#!" class="btn btn-primary w-100">Save</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script-bottom')
@vite(['resources/js/pages/ecommerce-product-details.js'])
@endsection