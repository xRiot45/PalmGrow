@extends('layouts.vertical', ['title' => 'Role Add'])

@section('css')
  @vite(['node_modules/choices.js/public/assets/styles/choices.min.css'])
@endsection

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Roles Information</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6">
              <form>
                <div class="mb-3">
                  <label for="roles-name" class="form-label">Roles Name</label>
                  <input type="text" id="roles-name" class="form-control" placeholder="Role name">
                </div>
              </form>
            </div>
            <div class="col-lg-6">
              <form>
                <div class="mb-3">
                  <label for="workspace" class="form-label">Add Workspace</label>
                  <select class="form-control" id="workspace" data-choices data-choices-groups
                    data-placeholder="Select Workspace">
                    <option value="Select Workspace"></option>
                    <option value="Facebook">Facebook</option>
                    <option value="Slack">Slack</option>
                    <option value="Zoom">Zoom</option>
                    <option value="Analytics">Analytics</option>
                    <option value="Meet">Meet</option>
                    <option value="Mail">Mail</option>
                    <option value="Strip">Strip</option>
                  </select>
                </div>
              </form>
            </div>
            <div class="col-lg-6">
              <div class="mb-3">
                <label for="role-tag" class="form-label">Tag</label>
                <select class="form-control" id="choices-multiple-remove-button" data-choices
                  data-choices-removeItem name="choices-multiple-remove-button" multiple>
                  <option value="Manager">Manager</option>
                  <option value="Product">Product</option>
                  <option value="Data">Data</option>
                  <option value="Designer">Designer</option>
                  <option value="Supporter">Supporter</option>
                  <option value="System Design">System Design</option>
                  <option value="QA">QA</option>
                </select>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="mb-3">
                <label for="user-name" class="form-label">User Name</label>
                <input type="text" id="user-name" class="form-control" placeholder="Enter name">
              </div>
            </div>
            <div class="col-lg-6">
              <p>User Status </p>
              <div class="d-flex gap-2 align-items-center">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="flexRadioDefault"
                    id="flexRadioDefault1" checked="">
                  <label class="form-check-label" for="flexRadioDefault1">
                    Active
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="flexRadioDefault"
                    id="flexRadioDefault2">
                  <label class="form-check-label" for="flexRadioDefault2">
                    In Active
                  </label>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="card-footer border-top">
          <a href="#!" class="btn btn-primary">Create Roles</a>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script-bottom')
  @vite(['resources/js/pages/app-ecommerce-product.js'])
@endsection
