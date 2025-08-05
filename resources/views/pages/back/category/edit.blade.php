@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="breadcrumbs-inline pt-3 pb-1" id="breadcrumbs-wrapper">
      <!-- Search for small screen-->
      <div class="container">
        <div class="row">
          <div class="col s10 m6 l6 breadcrumbs-left">
            <h5 class="breadcrumbs-title mt-0 mb-0 display-inline hide-on-small-and-down">Update Category</h5>
            <ol class="breadcrumbs mb-0">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
              </li>
              </li>
              <li class="breadcrumb-item active">Update
              </li>
            </ol>
          </div>
          <div class="col s2 m6 l6"><a class="btn btn-floating dropdown-settings waves-effect waves-light breadcrumbs-btn right amber darken-4" href="{{ route('categories.index') }}"><i class="material-icons right">arrow_back</i></a>

          </div>
        </div>
      </div>
    </div>
    <div class="col s12">
      <div class="container">
        <div class="section section-data-tables">
        <!-- DataTables example -->
        <div class="row">
        <div class="col s12 m8 l6">
        <div id="button-trigger" class="card card card-default scrollspy">
            <div class="card-content">
                <form class="col s12" method="POST" action="{{ route('categories.update', $category ->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="input-field col s12">
                    <input placeholder="Aarong" id="name2" name="name" type="text" value="{{ old('name', $category ->name) }}">
                    <label for="name2" class="active">Category Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Update
                        <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        </div>
        </div>
        </div>
      </div>
    </div>
  </div>
@endsection
