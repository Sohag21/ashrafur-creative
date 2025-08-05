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
                        <h5 class="mt-0">Update Social links & Fun Facts</h5>
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
                          <form class="col s12" method="POST" action="{{ route('settings.social.update', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="input-field col m6 s12">
                                    <div id="link-list">
                                        @php
                                            $links = old('links', $data->links ?? []);
                                        @endphp

                                        @foreach($links as $index => $link)
                                            <div class="link-item mb-2 flex gap-2">
                                                <input type="text" name="links[{{ $index }}][name]" value="{{ $link['name'] ?? '' }}" placeholder="Platform (e.g., Facebook)" class="border p-1" />
                                                <input type="text" name="links[{{ $index }}][url]" value="{{ $link['url'] ?? '' }}" placeholder="URL (e.g., https://...)" class="border p-1 w-full" />
                                                <button class="btn-custom" type="button" onclick="removeLink(this)" class=""><i class="material-icons">delete</i></button>
                                            </div>
                                        @endforeach
                                    </div>
                                    <button type="button" onclick="addLink()" class="btn-custom modal-trigger">Add Link</button>
                                </div>
                                <div class="input-field col m6 s12">
                                    <div id="facts-list">
                                        @php
                                            $facts = old('facts', $data->facts ?? []);
                                        @endphp

                                        @foreach($facts as $index => $fact)
                                            <div class="fact-item mb-2 flex gap-2">
                                                <input type="text" name="facts[{{ $index }}][name]" value="{{ $fact['name'] ?? '' }}" placeholder="Fact Title (e.g., Project Completed)" class="border p-1 w-full" />
                                                <input type="text" name="facts[{{ $index }}][projects]" value="{{ $fact['projects'] ?? '' }}" placeholder="Value (e.g., 100, 45k)" class="border p-1 w-40" />
                                                <button class="btn-custom" type="button" onclick="removeFact(this)" class=""><i class="material-icons">delete</i></button>

                                            </div>
                                        @endforeach
                                    </div>
                                    <button type="button" onclick="addFact()" class="btn-custom modal-trigger">Add Fact</button>
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
    let linkIndex = {{ count($links) }};
    function addLink() {
        const list = document.getElementById('link-list');
        const item = document.createElement('div');
        item.className = 'link-item mb-2 flex gap-2';
        item.innerHTML = `
            <input type="text" name="links[${linkIndex}][name]" placeholder="Platform (e.g., Facebook)" class="border p-1" />
            <input type="text" name="links[${linkIndex}][url]" placeholder="URL (e.g., https://...)" class="border p-1 w-full" />
            <button class="btn-custom" type="button" onclick="removeLink(this)" class=""><i class="material-icons">delete</i></button>
        `;
        list.appendChild(item);
        linkIndex++;
    }

    function removeLink(button) {
        button.parentElement.remove();
    }

    let factIndex = {{ count($facts) }};

    function addFact() {
        const list = document.getElementById('facts-list');
        const item = document.createElement('div');
        item.className = 'fact-item mb-2 flex gap-2';
        item.innerHTML = `
            <input type="text" name="facts[${factIndex}][name]" placeholder="Fact Title" class="border p-1 w-full" />
            <input type="text" name="facts[${factIndex}][projects]" placeholder="Value" class="border p-1 w-40" />
            <button class="btn-custom" type="button" onclick="removeFact(this)" class=""><i class="material-icons">delete</i></button>
        `;
        list.appendChild(item);
        factIndex++;
    }
    function removeFact(button) {
        button.parentElement.remove();
    }
</script>

@endsection


