@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="breadcrumbs-inline pt-3 pb-1" id="breadcrumbs-wrapper">
      <!-- Search for small screen-->
      <div class="container">
        <div class="row">
          <div class="col s10 m6 l6 breadcrumbs-left">
            <h5 class="breadcrumbs-title mt-0 mb-0 display-inline hide-on-small-and-down">Add Member</h5>
            <ol class="breadcrumbs mb-0">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
              </li>
              </li>
              <li class="breadcrumb-item active">Add New Member
              </li>
            </ol>
          </div>
          <div class="col s2 m6 l6"><a class="btn btn-floating dropdown-settings waves-effect waves-light breadcrumbs-btn right amber darken-4" href="{{ route('teams.index') }}"><i class="material-icons right">arrow_back</i></a>

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
                <form class="col s12" method="POST" action="{{ isset($partner) ? route('teams.update', $partner->id) : route('teams.store') }}" enctype="multipart/form-data">
                    @csrf
                <div class="row">
                    <div class="input-field col s12">
                    <input placeholder="Sohag Ahmed" id="name2" name="name" type="text">
                    <label for="name2" class="active">Member Name*</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                    <input placeholder="Software Engineer" id="des" name="designation" type="text">
                    <label for="des" class="active">Designation*</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                      <textarea placeholder="Say something about your member" id="about" name="about" class="materialize-textarea"></textarea>
                      <label for="about" class="active">About*</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <div class="dropify-wrapper mt-1">
                            <div class="dropify-message">
                                <span class="file-icon"></span>
                                <p>Drag and drop a file here or click</p>
                                <p class="dropify-error">Ooops, something wrong appended.</p>
                            </div>
                            <div class="dropify-loader"></div>
                            <div class="dropify-errors-container">
                                <ul></ul>
                            </div>
                            <input type="file" name="image" id="input-file-now" class="dropify" data-default-file="">
                            <button type="button" class="dropify-clear">Remove</button>
                            <div class="dropify-preview">
                                <span class="dropify-render"></span>
                                <div class="dropify-infos">
                                    <div class="dropify-infos-inner">
                                        <p class="dropify-filename">
                                            <span class="file-icon"></span>
                                            <span class="dropify-filename-inner"></span>
                                        </p>
                                        <p class="dropify-infos-message">Drag and drop or click to replace</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <label for="email" class="active">Picture*</label>
                    </div>
                </div>
                <div class="row mt-2">
                    @if($errors->any())
                        <div>
                            @foreach($errors->all() as $error)
                                <p style="color:red">{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
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
