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
                        <h5 class="mt-0">Update Academic & Job Information</h5>
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
                          <form class="col s12" method="POST" action="{{ route('settings.edu.update', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                              <div class="input-field col m6 s12">
                                <i class="material-icons prefix"> school </i>
                                <input id="institute" name="institute" type="text" class="validate" value="{{ $data->institute }}">
                                <label for="institute" class="">Latest Institute *</label>
                              </div>
                              <div class="input-field col m6 s12">
                                <i class="material-icons prefix"> layers </i>
                                <input id="degree" name="degree" type="text" class="validate" value="{{ $data->degree }}">
                                <label for="degree" class="">Latest Degree *</label>
                              </div>
                            </div>

                            <div class="row">
                                <div class="input-field col m6 s12">
                                    <h5>Institutes</h5>
                                    <div id="education-list">
                                        @php
                                            $educations = old('educations', $data->educations ?? []);
                                        @endphp

                                        @foreach($educations as $index => $edu)
                                            <div class="education-item mb-2 flex gap-2">
                                                <input type="text" name="educations[{{ $index }}][institution]" value="{{ $edu['institution'] ?? '' }}" placeholder="Institution" class="border p-1" />
                                                <input type="text" name="educations[{{ $index }}][degree]" value="{{ $edu['degree'] ?? '' }}" placeholder="Degree" class="border p-1" />
                                                <input type="text" name="educations[{{ $index }}][start]" value="{{ $edu['start'] ?? '' }}" placeholder="Start Year" class="border p-1 w-20" />
                                                <input type="text" name="educations[{{ $index }}][end]" value="{{ $edu['end'] ?? '' }}" placeholder="End Year(Leave it if it's running)" class="border p-1 w-20" />

                                                <button class="btn-custom" type="button" onclick="removeEducation(this)" class=""><i class="material-icons">delete</i></button>
                                            </div>
                                        @endforeach
                                    </div>

                                    <button type="button" onclick="addEducation()" class="btn-custom modal-trigger">Add Education</button>
                                </div>
                                <div class="input-field col m6 s12">
                                    <h5>Experiences</h5>
                                    <div id="experience-list">
                                        @php
                                            $experiences = old('experiences', $data->experiences ?? []);
                                        @endphp

                                        @foreach($experiences as $index => $exp)
                                            <div class="experience-item mb-2 flex gap-2">
                                                <input type="text" name="experiences[{{ $index }}][company]" value="{{ $exp['company'] ?? '' }}" placeholder="Company" class="border p-1" />
                                                <input type="text" name="experiences[{{ $index }}][role]" value="{{ $exp['role'] ?? '' }}" placeholder="Role" class="border p-1" />
                                                <input type="text" name="experiences[{{ $index }}][start]" value="{{ $exp['start'] ?? '' }}" placeholder="Start Year" class="border p-1 w-20" />
                                                <input type="text" name="experiences[{{ $index }}][end]" value="{{ $exp['end'] ?? '' }}" placeholder="End Year (Leave it if it's running)" class="border p-1 w-20" />
                                                <button type="button" onclick="removeExperience(this)" class="btn-custom"><i class="material-icons">delete</i></button>
                                            </div>
                                        @endforeach
                                    </div>

                                    <button type="button" onclick="addExperience()" class="btn-custom modal-trigger">Add Experience</button>
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

    let eduIndex = {{ count($educations) }};

    function addEducation() {
        const list = document.getElementById('education-list');
        const item = document.createElement('div');
        item.className = 'education-item mb-2 flex gap-2';
        item.innerHTML = `
            <input type="text" name="educations[${eduIndex}][institution]" placeholder="Institution Name" class="border p-1" />
            <input type="text" name="educations[${eduIndex}][degree]" placeholder="Degree" class="border p-1" />
            <input type="text" name="educations[${eduIndex}][start]" placeholder="Start Year" class="border p-1 w-20" />
            <input type="text" name="educations[${eduIndex}][end]" placeholder="End Year(Leave it if it's running)" class="border p-1 w-20" />

            <button class="btn-custom" type="button" onclick="removeEducation(this)"><i class="material-icons">delete</i></button>
        `;
        list.appendChild(item);
        eduIndex++;
    }

    function removeEducation(button) {
        button.parentElement.remove();
    }

    let expIndex = {{ count($experiences) }};

    function addExperience() {
        const list = document.getElementById('experience-list');
        const item = document.createElement('div');
        item.className = 'experience-item mb-2 flex gap-2';
        item.innerHTML = `
            <input type="text" name="experiences[${expIndex}][company]" placeholder="Company" class="border p-1" />
            <input type="text" name="experiences[${expIndex}][role]" placeholder="Role" class="border p-1" />
            <input type="text" name="experiences[${expIndex}][start]" placeholder="Start Year" class="border p-1 w-20" />
            <input type="text" name="experiences[${expIndex}][end]" placeholder="End Year(Leave it if it's running)" class="border p-1 w-20" />
            <button type="button" onclick="removeExperience(this)" class="btn-custom"><i class="material-icons">delete</i></button>
        `;
        list.appendChild(item);
        expIndex++;
    }

    function removeExperience(button) {
        button.parentElement.remove();
    }

</script>

@endsection
