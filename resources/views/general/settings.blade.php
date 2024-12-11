@extends('layouts.vertical', ['title' => 'Settings'])

@section('css')
@vite(['node_modules/choices.js/public/assets/styles/choices.min.css'])
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title d-flex align-items-center gap-1"><iconify-icon icon="solar:settings-bold-duotone" class="text-primary fs-20"></iconify-icon>General Settings</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form>
                            <div class="mb-3">
                                <label for="meta-name" class="form-label">Meta Title</label>
                                <input type="text" id="meta-name" class="form-control" placeholder="Title">
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6">
                        <form>
                            <div class="mb-3">
                                <label for="meta-tag" class="form-label">Meta Tag Keyword</label>
                                <input type="text" id="meta-tag" class="form-control" placeholder="Enter word">
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6">
                        <form>
                            <div class="mb-3">
                                <label for="themes" class="form-label">Store Themes</label>
                                <select class="form-control" id="themes" data-choices data-choices-groups data-placeholder="Select Themes">
                                    <option value="">Default</option>
                                    <option value="Dark">Dark</option>
                                    <option value="Minimalist">Minimalist</option>
                                    <option value="High Contrast">High Contrast</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6">
                        <form>
                            <div class="mb-3">
                                <label for="layout" class="form-label">Layout</label>
                                <select class="form-control" id="layout" data-choices data-choices-groups data-placeholder="Select Layout">
                                    <option value="">Default</option>
                                    <option value="Electronics">Electronics</option>
                                    <option value="Fashion">Fashion</option>
                                    <option value="Dining">Dining</option>
                                    <option value="Interior">Interior</option>
                                    <option value="Home">Home</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-12">
                        <div class="">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control bg-light-subtle" id="description" rows="4" placeholder="Type description"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title d-flex align-items-center gap-1"><iconify-icon icon="solar:shop-2-bold-duotone" class="text-primary fs-20"></iconify-icon>Store Settings</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form>
                            <div class="mb-3">
                                <label for="store-name" class="form-label">Store Name</label>
                                <input type="text" id="store-name" class="form-control" placeholder="Enter name">
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6">
                        <form>
                            <div class="mb-3">
                                <label for="owner-name" class="form-label">Store Owner Full Name</label>
                                <input type="text" id="owner-name" class="form-control" placeholder="Full name">
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="schedule-number" class="form-label">Owner Phone number</label>
                            <input type="number" id="schedule-number" name="schedule-number" class="form-control" placeholder="Number">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <form>
                            <div class="mb-3">
                                <label for="schedule-email" class="form-label">Owner Email</label>
                                <input type="email" id="schedule-email" name="schedule-email" class="form-control" placeholder="Email">
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="address" class="form-label">Full Address</label>
                            <textarea class="form-control bg-light-subtle" id="address" rows="3" placeholder="Type address"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <form>
                            <div class="mb-3">
                                <label for="your-zipcode" class="form-label">Zip-Code</label>
                                <input type="number" id="your-zipcode" class="form-control" placeholder="zip-code">
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <form>
                            <div class="mb-3">
                                <label for="choices-city" class="form-label">City</label>
                                <select class="form-control" id="choices-city" data-choices data-choices-groups data-placeholder="Select City" name="choices-city">
                                    <option value="">Choose a city</option>
                                    <optgroup label="UK">
                                        <option value="London">London</option>
                                        <option value="Manchester">Manchester</option>
                                        <option value="Liverpool">Liverpool</option>
                                    </optgroup>
                                    <optgroup label="FR">
                                        <option value="Paris">Paris</option>
                                        <option value="Lyon">Lyon</option>
                                        <option value="Marseille">Marseille</option>
                                    </optgroup>
                                    <optgroup label="DE" disabled>
                                        <option value="Hamburg">Hamburg</option>
                                        <option value="Munich">Munich</option>
                                        <option value="Berlin">Berlin</option>
                                    </optgroup>
                                    <optgroup label="US">
                                        <option value="New York">New York</option>
                                        <option value="Washington" disabled>
                                            Washington
                                        </option>
                                        <option value="Michigan">Michigan</option>
                                    </optgroup>
                                    <optgroup label="SP">
                                        <option value="Madrid">Madrid</option>
                                        <option value="Barcelona">Barcelona</option>
                                        <option value="Malaga">Malaga</option>
                                    </optgroup>
                                    <optgroup label="CA">
                                        <option value="Montreal">Montreal</option>
                                        <option value="Toronto">Toronto</option>
                                        <option value="Vancouver">Vancouver</option>
                                    </optgroup>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <form>
                            <label for="choices-country" class="form-label">Country</label>
                            <select class="form-control" id="choices-country" data-choices data-choices-groups data-placeholder="Select Country" name="choices-country">
                                <option value="">Choose a country</option>
                                <optgroup label="">
                                    <option value="">United Kingdom</option>
                                    <option value="Fran">France</option>
                                    <option value="Netherlands">Netherlands</option>
                                    <option value="U.S.A">U.S.A</option>
                                    <option value="Denmark">Denmark</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Australia">Australia</option>
                                    <option value="India">India</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Spain">Spain</option>
                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                </optgroup>
                            </select>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title d-flex align-items-center gap-1"><iconify-icon icon="solar:compass-bold-duotone" class="text-primary fs-20"></iconify-icon>Localization Settings</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form>
                            <div class="mb-3">
                                <label for="choices-country1" class="form-label">Country</label>
                                <select class="form-control" id="choices-country1" data-choices data-choices-groups data-placeholder="Select Country" name="choices-country">
                                    <option value="">Choose a country</option>
                                    <optgroup label="">
                                        <option value="">United Kingdom</option>
                                        <option value="Fran">France</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="U.S.A">U.S.A</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Australia">Australia</option>
                                        <option value="India">India</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Spain">Spain</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                    </optgroup>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6">
                        <form>
                            <div class="mb-3">
                                <label for="choices-language" class="form-label">Language</label>
                                <select class="form-control" id="choices-language" data-choices data-choices-groups data-placeholder="Select language" name="choices-language">
                                    <option value="">English</option>
                                    <optgroup label="">
                                        <option value="">Russian</option>
                                        <option value="Arabic">Arabic</option>
                                        <option value="Spanish">Spanish</option>
                                        <option value="Turkish">Turkish</option>
                                        <option value="German">German</option>
                                        <option value="Armenian">Armenian</option>
                                        <option value="Italian">Italian</option>
                                        <option value="Catalán">Catalán</option>
                                        <option value="Hindi">Hindi</option>
                                        <option value="Japanese">Japanese</option>
                                        <option value="French">French</option>
                                    </optgroup>
                                </select>

                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6">
                        <form>
                            <div class="mb-3">
                                <label for="choices-currency" class="form-label">Currency</label>
                                <select class="form-control" id="choices-currency" data-choices data-choices-groups data-placeholder="Select Currency" name="choices-currency">
                                    <option value="">Us Dollar</option>
                                    <optgroup label="">
                                        <option value="">Pound</option>
                                        <option value="Indian Rupee">Indian Rupee</option>
                                        <option value="Euro">Euro</option>
                                        <option value="Australian Dollar">Australian Dollar</option>
                                        <option value="Japanese Yen">Japanese Yen</option>
                                        <option value="Korean Won">Korean Won</option>
                                    </optgroup>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6">
                        <form>
                            <div class="mb-3">
                                <label for="choices-length" class="form-label">Length Class</label>
                                <select class="form-control" id="choices-length" data-choices data-choices-groups data-placeholder="Select Length" name="choices-length">
                                    <option value="">Centimeter</option>
                                    <optgroup label="">
                                        <option value="">Millimeter</option>
                                        <option value="Inch">Inch</option>
                                    </optgroup>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6">
                        <form>
                            <div class="">
                                <label for="choices-weight" class="form-label">Weight Class</label>
                                <select class="form-control" id="choices-weight" data-choices data-choices-groups data-placeholder="Select Weight" name="choices-weight">
                                    <option value="">Kilogram</option>
                                    <optgroup label="">
                                        <option value="">Gram</option>
                                        <option value="Pound">Pound</option>
                                        <option value="Ounce">Ounce</option>
                                    </optgroup>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title d-flex align-items-center gap-1"><iconify-icon icon="solar:box-bold-duotone" class="text-primary fs-20"></iconify-icon>Categories Settings</h4>
            </div>
            <div class="card-body">
                <p>Category Product Count </p>
                <div class="d-flex gap-2 align-items-center mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                        <label class="form-check-label" for="flexRadioDefault2">
                            No
                        </label>
                    </div>
                </div>
                <form>
                    <div class="mb-1 pb-1">
                        <label for="items-par-page" class="form-label">Default Items Per Page</label>
                        <input type="number" id="items-par-page" class="form-control" placeholder="000">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title d-flex align-items-center gap-1"><iconify-icon icon="solar:chat-square-check-bold-duotone" class="text-primary fs-20"></iconify-icon>Reviews Settings</h4>
            </div>
            <div class="card-body">
                <p>Allow Reviews </p>
                <div class="d-flex gap-2 align-items-center mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault2" id="flexRadioDefault3" checked>
                        <label class="form-check-label" for="flexRadioDefault3">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault2" id="flexRadioDefault4">
                        <label class="form-check-label" for="flexRadioDefault4">
                            No
                        </label>
                    </div>
                </div>
                <p class="mt-3 pt-1">Allow Guest Reviews </p>
                <div class="d-flex gap-2 align-items-center mb-2">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault3" id="flexRadioDefault5">
                        <label class="form-check-label" for="flexRadioDefault5">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault3" id="flexRadioDefault6" checked>
                        <label class="form-check-label" for="flexRadioDefault6">
                            No
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title d-flex align-items-center gap-1"><iconify-icon icon="solar:ticket-bold-duotone" class="text-primary fs-20"></iconify-icon>Vouchers Settings</h4>
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="min-vouchers" class="form-label">Minimum Vouchers</label>
                        <input type="number" id="min-vouchers" class="form-control" placeholder="000" value="1">
                    </div>
                </form>
                <form>
                    <div class="">
                        <label for="mex-vouchers" class="form-label">Maximum Vouchers</label>
                        <input type="number" id="mex-vouchers" class="form-control" placeholder="000" value="12">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title d-flex align-items-center gap-1"><iconify-icon icon="solar:ticket-sale-bold-duotone" class="text-primary fs-20"></iconify-icon>Tax Settings</h4>
            </div>
            <div class="card-body">
                <p>Prices with Tax</p>
                <div class="d-flex gap-2 align-items-center mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault4" id="flexRadioDefault7" checked>
                        <label class="form-check-label" for="flexRadioDefault7">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault4" id="flexRadioDefault8">
                        <label class="form-check-label" for="flexRadioDefault8">
                            No
                        </label>
                    </div>
                </div>
                <form>
                    <div class="mb-1 pb-1">
                        <label for="items-tax" class="form-label">Default Tax Rate</label>
                        <input type="text" id="items-tax" class="form-control" placeholder="000" value="18%">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title d-flex align-items-center gap-1"><iconify-icon icon="solar:users-group-two-rounded-bold-duotone" class="text-primary fs-20"></iconify-icon>Customers Settings</h4>
            </div>
            <div class="card-body">
                <div class="row justify-content-between g-3">
                    <div class="col-lg-2 border-end">
                        <p>Customers Online</p>
                        <div class="d-flex gap-2 align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault5" id="flexRadioDefault9" checked="">
                                <label class="form-check-label" for="flexRadioDefault9">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault5" id="flexRadioDefault10">
                                <label class="form-check-label" for="flexRadioDefault10">
                                    No
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 border-end">
                        <p>Customers Activity</p>
                        <div class="d-flex gap-2 align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault6" id="flexRadioDefault11" checked="">
                                <label class="form-check-label" for="flexRadioDefault11">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault6" id="flexRadioDefault12">
                                <label class="form-check-label" for="flexRadioDefault12">
                                    No
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 border-end">
                        <p>Customer Searches</p>
                        <div class="d-flex gap-2 align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault7" id="flexRadioDefault13" checked="">
                                <label class="form-check-label" for="flexRadioDefault13">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault7" id="flexRadioDefault14">
                                <label class="form-check-label" for="flexRadioDefault14">
                                    No
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 border-end">
                        <p>Allow Guest Checkout</p>
                        <div class="d-flex gap-2 align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault8" id="flexRadioDefault15">
                                <label class="form-check-label" for="flexRadioDefault15">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault8" id="flexRadioDefault16" checked="">
                                <label class="form-check-label" for="flexRadioDefault16">
                                    No
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <p>Login Display Price</p>
                        <div class="d-flex gap-2 align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault9" id="flexRadioDefault17">
                                <label class="form-check-label" for="flexRadioDefault17">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault9" id="flexRadioDefault18" checked="">
                                <label class="form-check-label" for="flexRadioDefault18">
                                    No
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-6">
                        <form>
                            <div class="">
                                <label for="login-attempts" class="form-label">Max Login Attempts</label>
                                <input type="text" id="login-attempts" class="form-control" placeholder="max" value="1 hour">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="text-end">
    <a href="#!" class="btn btn-danger">Cancel</a>
    <a href="#!" class="btn btn-success">Save Change</a>
</div>

@endsection

@section('script-bottom')
@vite(['resources/js/pages/app-ecommerce-product.js'])
@endsection