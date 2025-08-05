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
                        <h5 class="mt-0">Update Skills & Languages</h5>
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
                          <form class="col s12" method="POST" action="{{ route('settings.skill.update', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="input-field col m6 s12">
                                    <div id="line-heading">
                                        <label for="about" class="">Skill(s)</label>
                                    </div>
                                    <div id="skill-list">
                                        @php
                                            $skills = old('skills', $data->skills ?? []);
                                        @endphp

                                        @foreach($skills as $index => $skill)
                                            <div class="skill-item mb-2 flex gap-2">
                                                <input type="text" name="skills[{{ $index }}][name]" value="{{ $skill['name'] ?? '' }}" placeholder="Skill Name" class="border p-1" />
                                                <input type="text" name="skills[{{ $index }}][level]" value="{{ $skill['level'] ?? '' }}" placeholder="Skill Level(should be Expert, Advanced, Beginner)" class="border p-1" />
                                                <button class="btn-custom" type="button" onclick="removeSkill(this)" class=""><i class="material-icons">delete</i></button>
                                            </div>
                                        @endforeach
                                    </div>
                                    <button type="button" onclick="addSkill()" class="btn-custom modal-trigger">Add Skill</button>
                                </div>
                                <div class="input-field col m6 s12">
                                    <div id="line-heading">
                                        <label for="about" class="">Language(s)</label>
                                    </div>
                                    <div id="language-list">
                                        @php
                                            $languages = old('languages', $data->languages ?? []);
                                        @endphp

                                        @foreach($languages as $index => $language)
                                            <div class="language-item mb-2 flex gap-2">
                                                <input type="text" name="languages[{{ $index }}][name]" value="{{ $language['name'] ?? '' }}" placeholder="Language Name" class="border p-1" />
                                                <input type="text" name="languages[{{ $index }}][proficiency]" value="{{ $language['proficiency'] ?? '' }}" placeholder="Proficiency(should be Native, Fluent, Medium)" class="border p-1" />
                                                <button class="btn-custom" type="button" onclick="removeLanguage(this)" class=""><i class="material-icons">delete</i></button>

                                            </div>
                                        @endforeach
                                    </div>
                                    <button type="button" onclick="addLanguage()" class="btn-custom modal-trigger">Add Language</button>
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
    let skillIndex = {{ count($skills) }};

    function addSkill() {
        const list = document.getElementById('skill-list');
        const item = document.createElement('div');
        item.className = 'skill-item mb-2 flex gap-2';
        item.innerHTML = `
            <input type="text" name="skills[${skillIndex}][name]" placeholder="Skill Name" class="border p-1" />
            <input type="text" name="skills[${skillIndex}][level]" placeholder="Skill Level(should be Expert, Advanced, Beginner)" class="border p-1" />
            <button class="btn-custom" type="button" onclick="removeSkill(this)" class=""><i class="material-icons">delete</i></button>
        `;
        list.appendChild(item);
        skillIndex++;
    }

    function removeSkill(button) {
        button.parentElement.remove();
    }

    let langIndex = {{ count($languages) }};

    function addLanguage() {
        const list = document.getElementById('language-list');
        const item = document.createElement('div');
        item.className = 'language-item mb-2 flex gap-2';
        item.innerHTML = `
            <input type="text" name="languages[${langIndex}][name]" placeholder="Language Name" class="border p-1" />
            <input type="text" name="languages[${langIndex}][proficiency]" placeholder="Proficiency(should be Native, Fluent, Medium)" class="border p-1" />
            <button class="btn-custom" type="button" onclick="removeLanguage(this)" class=""><i class="material-icons">delete</i></button>
        `;
        list.appendChild(item);
        langIndex++;
    }

    function removeLanguage(button) {
        button.parentElement.remove();
    }

</script>

@endsection
