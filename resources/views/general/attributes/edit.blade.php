@extends('layouts.vertical', ['title' => 'Attribute Edit'])

@section('css')
@vite(['node_modules/choices.js/public/assets/styles/choices.min.css'])
@endsection 

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add Attribute</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form>
                            <div class="mb-3">
                                <label for="variant-name" class="form-label text-dark">Attribute Variant</label>
                                <input type="text" id="variant-name" class="form-control" placeholder="Enter Name" value="Brand">
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6">
                        <form>
                            <div class="mb-3">
                                <label for="value-name" class="form-label text-dark">Attribute Value</label>
                                <input type="text" id="value-name" class="form-control" placeholder="Enter Value" value="Dyson , H&M, Nike , GoPro , Huawei , Rolex , Zara , Thenorthface">
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6">
                        <form>
                            <div class="">
                                <label for="attribute-id" class="form-label text-dark">Attribute ID</label>
                                <input type="text" id="attribute-id" class="form-control" placeholder="Enter ID" value="BR-3922">
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6">
                        <form>
                            <div class="">
                                <label for="option" class="form-label"> Option</label>
                                <select class="form-control" id="option" data-choices data-choices-groups data-placeholder="Select Option">
                                    <option value="Dropdown" selected>Dropdown</option>
                                    <option value="Radio">Radio</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-footer border-top">
                <a href="#!" class="btn btn-primary">Edit Change</a>
            </div>
        </div>
    </div>
</div>

@endsection