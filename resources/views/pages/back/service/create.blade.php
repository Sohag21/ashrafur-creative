@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="breadcrumbs-inline pt-3 pb-1" id="breadcrumbs-wrapper">
      <!-- Search for small screen-->
      <div class="container">
        <div class="row">
          <div class="col s10 m6 l6 breadcrumbs-left">
            <h5 class="breadcrumbs-title mt-0 mb-0 display-inline hide-on-small-and-down">Service Create or Update</h5>
            <ol class="breadcrumbs mb-0">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
              </li>
              </li>
              <li class="breadcrumb-item active">Add New Service or Update
              </li>
            </ol>
          </div>
          <div class="col s2 m6 l6"><a class="btn btn-floating dropdown-settings waves-effect waves-light breadcrumbs-btn right amber darken-4" href="{{ route('service.index') }}"><i class="material-icons right">arrow_back</i></a>
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
                <form class="col s12" method="POST" action="{{ isset($service) ? route('service.update', $service->id) : route('service.store') }}" enctype="multipart/form-data">
                    @csrf
                    @if(isset($service))
                        @method('PUT')
                    @endif
                <div class="row">
                    <div class="input-field col s12">
                    <input placeholder="Book Cover Design" id="name2" name="name" type="text" value="{{ old('name', $service->name ?? '') }}" >
                    <label for="name2" class="active">Service Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <div id="feature-list">
                            @php $features = old('features', $service->features ?? ['']); @endphp
                            @foreach($features as $index => $feature)
                            <div class="feature-item mb-2 display-flex">
                                <input type="text" name="features[]" value="{{ $feature }}" placeholder="Feature" class="inline-block" />
                                <button class="btn btn-small gradient-45deg-purple-deep-orange" type="button" onclick="removeFeature(this)" class=""><i class="material-icons">remove</i></button>
                            </div>
                            @endforeach
                        </div>

                        <button class="btn btn-small gradient-45deg-light-blue-cyan" type="button" onclick="addFeature()">Add More</button>
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
                            <input type="file" name="icon" id="input-file-now" class="dropify" data-default-file="">
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
                        <label for="email" class="active">Icon</label>
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
@section('scripts')
<script>
    function addFeature() {
        const input = document.createElement('input');
        input.type = 'text';
        input.name = 'features[]';
        input.placeholder = 'Feature';
        document.getElementById('feature-list').appendChild(input);
    }
    function removeFeature(button) {
        button.closest('.feature-item').remove();
    }
</script>
@endsection
