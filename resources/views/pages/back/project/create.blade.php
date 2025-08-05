@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="breadcrumbs-inline pt-3 pb-1" id="breadcrumbs-wrapper">
      <!-- Search for small screen-->
      <div class="container">
        <div class="row">
          <div class="col s10 m6 l6 breadcrumbs-left">
            <h5 class="breadcrumbs-title mt-0 mb-0 display-inline hide-on-small-and-down">Create Project</h5>
            <ol class="breadcrumbs mb-0">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
              </li>
              </li>
              <li class="breadcrumb-item active">Create New Project
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
                <form class="col s12" method="POST" action="{{route('projects.store')}}" enctype="multipart/form-data">
                    @csrf
                <div class="row">
                    <div class="input-field col s12">
                    <input placeholder="xyz company branding" id="name2" name="project_title" type="text">
                    <label for="name2" class="active">Project Title*</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                    <input placeholder="Sohag Ahmed" id="client" name="client_name" type="text">
                    <label for="client" class="active">Client Name*</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 mt-4">
                        <select name="category_id" id="category_id">
                            <option value="" disabled="" selected="">Select Category</option>
                            @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                        <label for="category_id" class="active">Project Category*</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                      <textarea placeholder="Write project details" id="project_details" name="project_details" class="materialize-textarea"></textarea>
                      <label for="project_details" class="active">Project Details*</label>
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
                            <input type="file" name="cover_photo" id="input-file-now" class="dropify" data-default-file="">
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
                        <label for="email" class="active">Cover Photo*</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <div class="file-field input-field">
                            <div class="btn">
                            <span>File</span>
                            <input type="file" name="gallery_photos[]" multiple>
                          </div>
                          <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Upload one or more files">
                            </div>
                          </div>

                        <label for="email" class="active">Gallery Photos</label>
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
