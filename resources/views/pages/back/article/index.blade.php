@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="breadcrumbs-inline pt-3 pb-1" id="breadcrumbs-wrapper">
      <!-- Search for small screen-->
      <div class="container">
        <div class="row">
          <div class="col s10 m6 l6 breadcrumbs-left">
            <h5 class="breadcrumbs-title mt-0 mb-0 display-inline hide-on-small-and-down">Article Cards</h5>
            <ol class="breadcrumbs mb-0">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
              </li>
              </li>
              <li class="breadcrumb-item active">Articles
              </li>
            </ol>
          </div>
          <div class="col s2 m6 l6">
            <a class="btn btn-floating dropdown-settings waves-effect waves-light breadcrumbs-btn right ml-2" href="{{ route('articles.create') }}"><i class="material-icons right">add</i>
            </a>
            <a class="btn right" href="{{ route('blog-categories.index') }}">Categories
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="col s12">
      <div class="container">
        <div class="section section-data-tables">
        <!-- DataTables example -->
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="col s12">
                    @if (session('success'))
                        <div style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div style="background-color: #f8dada; color: #3c3c3c; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Blog Style One -->
            @foreach ($data as $value)
            <div class="col s12 m6 l3">
              <div class="card-panel border-radius-6 mt-10 card-animation-1">
                <a href="#"><img class="responsive-img border-radius-8 z-depth-4 image-n-margin" src="{{ asset('storage/' . $value->cover) }}" alt=""></a>
                <h6 class="deep-purple-text text-darken-3 mt-5"><a href="#">{{ $value->title }}</a></h6>
                <span class="blog-description">{{ $value->description }}</span>
                <div class="row mt-4">
                  <div class="col s5 mt-1">
                    <span class="pt-2">Cat: {{ $value->category->name }}</span>
                  </div>
                  <div class="col s7 right-align social-icon">
                    @if ($value->status)
                        <a href="{{ route('articles.status', $value->id) }}" onclick="return confirm('You want to change status?')"  class="chip green accent-1 dark-text">Active</a>

                    @else
                        <a href="{{ route('articles.status', $value->id) }}" onclick="return confirm('You want to change status?')"  class="chip red accent-1 white-text">Inactive</a>
                    @endif

                    <a href="{{ route('articles.edit', $value->id) }}" class="btn-floating btn-small waves-effect waves-light purple lightrn-1">
                        <i class="material-icons">edit</i>
                    </a>
                    <form method="POST" action="{{ route('articles.destroy', $value->id) }}" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn-floating btn-small waves-effect waves-light red accent-3" onclick="return confirm('Delete this blog?')"><i class="material-icons">delete</i></button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            <!-- Blog Style Two -->
          </div>
        <div class="pagination-content mt-1">
            @if ($data->hasPages())
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($data->onFirstPage())
                    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                @else
                    <li class="waves-effect">
                        <a href="{{ $data->previousPageUrl() }}"><i class="material-icons">chevron_left</i></a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($data->getUrlRange(1, $data->lastPage()) as $page => $url)
                    @if ($page == $data->currentPage())
                        <li class="active"><a href="#!">{{ $page }}</a></li>
                    @else
                        <li class="waves-effect"><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($data->hasMorePages())
                    <li class="waves-effect">
                        <a href="{{ $data->nextPageUrl() }}"><i class="material-icons">chevron_right</i></a>
                    </li>
                @else
                    <li class="disabled"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                @endif
            </ul>
            @endif
        </div>
        </div>
      </div>
    </div>
  </div>
@endsection
