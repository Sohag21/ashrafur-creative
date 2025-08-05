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
                        <h5 class="mt-0">Update Password</h5>
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
                                @error('password', 'updatePassword')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- @dd($settings) --}}
                        <div class="row">
                          <form class="col s12" method="POST" action="{{ route('password.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                              <div class="input-field col m6 s12">
                                <i class="material-icons prefix"> lock_outline </i>
                                <input id="password" name="password" type="password" class="validate" value="">
                                <label for="password" class="">Password *</label>
                              </div>
                              <div class="input-field col m6 s12">
                                <i class="material-icons prefix"> lock_outline </i>
                                <input id="confirm_password" name="password_confirmation" type="password" class="validate" value="">
                                <label for="confirm_password" class="">Confirm Password *</label>
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
            <button class="btn btn-small gradient-45deg-purple-deep-orange" type="button" onclick="removeInterest(this)" class=""><i class="material-icons">remove</i></button>
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
            <button class="btn btn-small gradient-45deg-purple-deep-orange" type="button" onclick="removeAward(this)" class=""><i class="material-icons">remove</i></button>
        `;

        document.getElementById('award-list').appendChild(wrapper);
    }

    function removeAward(button) {
        button.closest('.award-item').remove();
    }
</script>

@endsection
