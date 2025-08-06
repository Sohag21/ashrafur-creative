@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/back/css/pages/app-contacts.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/back/css/pages/app-sidebar.css')}}">
@endsection
@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col s12">
      <div class="container">
        <!-- Sidebar Area Starts -->
        @include('pages.back.settings.sidebar')
        <!-- Sidebar Area Ends -->

        <!-- Content Area Starts -->
        <div class="content-area content-right">
            <div class="card card card-default scrollspy border-radius-6 fixed-width">
                <div class="card-content p-2">
                    <div class="modal-content">
                        <h5 class="mt-0">Update Profile Information</h5>
                        <hr>
                        <div class="row">
                            <div class="col s12">
                                @if (session('success'))
                                    <div style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if($errors->any())
                                    <div>
                                        @foreach($errors->all() as $error)
                                            <p style="color:red">{{ $error }}</p>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                        {{-- @dd($settings) --}}
                        <div class="row">
                          <form class="col s12" method="POST" action="{{ route('settings.update', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                              <div class="input-field col m4 s12">
                                <i class="material-icons prefix"> perm_identity </i>
                                <input id="name" name="name" type="text" class="validate" value="{{ $user->name }}">
                                <label for="name" class="">Name *</label>
                              </div>
                              <div class="input-field col m4 s12">
                                <i class="material-icons prefix"> email </i>
                                <input disabled id="email" name="email" type="text" class="validate" value="{{ $user->email }}">
                                <label for="email" class="">Admin Email</label>
                              </div>
                              <div class="input-field col m4 s12">
                                <i class="material-icons prefix"> email </i>
                                <input id="email" name="public_email" type="text" class="validate" value="{{ $data->public_email }}">
                                <label for="email" class="">Public Email *</label>
                              </div>
                              <div class="input-field col m6 s12">
                                <i class="material-icons prefix"> call </i>
                                <input id="phone" name="phone" type="text" class="validate" value="{{ $data->phone }}">
                                <label for="phone" class="">Phone</label>
                              </div>
                              <div class="input-field col m6 s12">
                                <div class="file-field input-field">
                                    <div class="btn btn-small">
                                      <span>Resume</span>
                                      <input name="resume" type="file">
                                    </div>
                                    <div class="file-path-wrapper">
                                      <input class="file-path validate" type="text">
                                    </div>
                                  </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="input-field col s12">
                                <i class="material-icons prefix"> note </i>
                                <textarea id="about" name="about" type="text" class="materialize-textarea">{{ $data->about }}</textarea>
                                <label for="about" class="">About *</label>
                              </div>
                              <div class="input-field col s12">
                                <i class="material-icons prefix"> note </i>
                                <textarea id="motivation" name="motivation" type="text" class="materialize-textarea">{{ $data->motivation }}</textarea>
                                <label for="motivation" class="">Motivation *</label>
                              </div>
                              <div class="input-field col s12">
                                <i class="material-icons prefix"> location_on </i>
                                <textarea id="address" name="address" type="text" class="materialize-textarea">{{ $data->address }}</textarea>
                                <label for="address" class="">Address *</label>
                              </div>
                            </div>
                            <div class="row">
                                <div class="input-field col m6 s12">
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
                                        @if(isset($data) && $data->photo)
                                            <input type="file" name="photo" class="dropify"
                                                    data-default-file="{{ asset('storage/' . $data->photo) }}" />
                                        @else
                                            <input type="file" name="photo" class="dropify" />
                                        @endif
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
                                    <label for="email" class="active">Photo</label>
                                </div>
                                <div class="input-field col m6 s12">
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
                                        @if(isset($data) && $data->cover)
                                            <input type="file" name="cover" class="dropify"
                                                    data-default-file="{{ asset('storage/' . $data->cover) }}" />
                                        @else
                                            <input type="file" name="cover" class="dropify" />
                                        @endif
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
                                    <label for="cover" class="active">Cover Photo</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col m6 s12">
                                    <div id="interest-list">
                                        @php $interests = old('interests', $data->interests ?? ['']); @endphp
                                        @foreach($interests as $index => $interest)
                                            <div class="interest-item mb-1 display-flex">
                                                <input type="text" name="interests[]" value="{{ $interest }}" placeholder="Interest" class="inline-block" />
                                                <button class="btn-custom" type="button" onclick="removeInterest(this)" class=""><i class="material-icons">delete</i></button>
                                            </div>
                                        @endforeach
                                    </div>
                                    <button type="button" onclick="addInterest()" class="btn-custom modal-trigger">Add Interest</button>
                                </div>
                                <div class="input-field col m6 s12">
                                    <div id="award-list">
                                        @php $awards = old('awards', $data->awards ?? ['']); @endphp
                                        @foreach($awards as $index => $award)
                                            <div class="award-item mb-1 display-flex">
                                                <input type="text" name="awards[]" value="{{ $award }}" placeholder="Award" class="inline-block" />
                                                <button class="btn-custom" type="button" onclick="removeAward(this)" class=""><i class="material-icons">delete</i></button>
                                            </div>
                                        @endforeach
                                    </div>
                                    <button type="button" onclick="addAward()" class="btn-custom modal-trigger">Add Award</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col m6 s12">
                                    <div id="des-list">
                                        @php $designation = old('designation', $data->designation ?? ['']); @endphp
                                        @foreach($designation as $index => $des)
                                            <div class="des-item mb-1 display-flex">
                                                <input type="text" name="designation[]" value="{{ $des }}" placeholder="des" class="inline-block" />
                                                <button class="btn-custom" type="button" onclick="removeDes(this)" class=""><i class="material-icons">delete</i></button>
                                            </div>
                                        @endforeach
                                    </div>
                                    <button type="button" onclick="addDes()" class="btn-custom modal-trigger">Add Designation</button>
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
@section('scripts')
<script>
    function addInterest() {
        const wrapper = document.createElement('div');
        wrapper.classList.add('interest-item', 'mb-1', 'display-flex');

        wrapper.innerHTML = `
            <input type="text" name="interests[]" placeholder="Interest" class="inline-block" />
            <button class="btn-custom" type="button" onclick="removeInterest(this)" class=""><i class="material-icons">delete</i></button>
        `;

        document.getElementById('interest-list').appendChild(wrapper);
    }

    function removeInterest(button) {
        button.closest('.interest-item').remove();
    }

    function addAward() {
        const wrapper = document.createElement('div');
        wrapper.classList.add('award-item', 'mb-1', 'display-flex');

        wrapper.innerHTML = `
            <input type="text" name="awards[]" placeholder="Award" class="inline-block" />
            <button class="btn-custom" type="button" onclick="removeAward(this)" class=""><i class="material-icons">delete</i></button>
        `;

        document.getElementById('award-list').appendChild(wrapper);
    }

    function removeAward(button) {
        button.closest('.award-item').remove();
    }

    function addDes() {
        const wrapper = document.createElement('div');
        wrapper.classList.add('des-item', 'mb-1', 'display-flex');

        wrapper.innerHTML = `
            <input type="text" name="designation[]" placeholder="Designation" class="inline-block" />
            <button class="btn-custom" type="button" onclick="removeDes(this)" class=""><i class="material-icons">delete</i></button>
        `;

        document.getElementById('des-list').appendChild(wrapper);
    }

    function removeDes(button) {
        button.closest('.des-item').remove();
    }
</script>
@endsection
