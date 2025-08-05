@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="breadcrumbs-inline pt-3 pb-1" id="breadcrumbs-wrapper">
      <!-- Search for small screen-->
      <div class="container">
        <div class="row">
          <div class="col s10 m6 l6 breadcrumbs-left">
            <h5 class="breadcrumbs-title mt-0 mb-0 display-inline hide-on-small-and-down">Category List</h5>
            <ol class="breadcrumbs mb-0">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
              </li>
              </li>
              <li class="breadcrumb-item active">categories
              </li>
            </ol>
          </div>
          <div class="col s2 m6 l6">
            <a class="btn btn-floating dropdown-settings waves-effect waves-light breadcrumbs-btn right" href="{{ route('categories.create') }}"><i class="material-icons right">add</i></a>
            <a class="btn btn-floating dropdown-settings waves-effect waves-light breadcrumbs-btn right amber darken-4 mr-1" href="{{ route('projects.index') }}"><i class="material-icons right">arrow_back</i></a>
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
        <div id="button-trigger" class="card card card-default scrollspy">
            <div class="card-content">
            <div class="row">
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
                <div class="col s12">
                <table id="" class="display">
                    <thead>
                    <tr>
                        <th>#SL</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th style="width: 200px">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($categories as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->slug }}</td>
                        <td>
                            <a href="{{ route('categories.edit', $data->id) }}" class="mb-6 btn-floating waves-effect waves-light purple lightrn-1">
                                <i class="material-icons">edit</i>
                            </a>
                            <form method="POST" action="{{ route('categories.destroy', $data->id) }}" style="display:inline;">
                                @csrf @method('DELETE')
                                <button class="mb-6 btn-floating waves-effect waves-light red accent-3" onclick="return confirm('Delete this category?')"><i class="material-icons">delete</i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">No data found :)</td>
                    </tr>
                    @endforelse
                    </tbody>
                </table>
                {{-- Pagination Links --}}
                <div class="pagination-content mt-1">
                    @if ($categories->hasPages())
                    <ul class="pagination">
                        {{-- Previous Page Link --}}
                        @if ($categories->onFirstPage())
                            <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                        @else
                            <li class="waves-effect">
                                <a href="{{ $categories->previousPageUrl() }}"><i class="material-icons">chevron_left</i></a>
                            </li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($categories->getUrlRange(1, $categories->lastPage()) as $page => $url)
                            @if ($page == $categories->currentPage())
                                <li class="active"><a href="#!">{{ $page }}</a></li>
                            @else
                                <li class="waves-effect"><a href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($categories->hasMorePages())
                            <li class="waves-effect">
                                <a href="{{ $categories->nextPageUrl() }}"><i class="material-icons">chevron_right</i></a>
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
        </div>
        </div>
        </div>
      </div>
    </div>
  </div>
@endsection
