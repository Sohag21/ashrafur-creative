@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="breadcrumbs-inline pt-3 pb-1" id="breadcrumbs-wrapper">
      <!-- Search for small screen-->
      <div class="container">
        <div class="row">
          <div class="col s10 m6 l6 breadcrumbs-left">
            <h5 class="breadcrumbs-title mt-0 mb-0 display-inline hide-on-small-and-down">Team Members List</h5>
            <ol class="breadcrumbs mb-0">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
              </li>
              </li>
              <li class="breadcrumb-item active">Team Members
              </li>
            </ol>
          </div>
          <div class="col s2 m6 l6"><a class="btn btn-floating dropdown-settings waves-effect waves-light breadcrumbs-btn right" href="{{ route('teams.create') }}"><i class="material-icons right">add</i></a>

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
                        <th>Image</th>
                        <th>Member Name</th>
                        <th>Designation</th>
                        <th>About</th>
                        <th>Status</th>
                        <th style="width: 200px">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($teamMembers as $teamMember)
                    <tr>
                        <td>{{ $teamMember->id }}</td>
                        <td>
                            <div class="user-media">
                                <img src="{{ asset('storage/' . $teamMember->image) }}" alt="logo" class="circle z-depth-2 avtar" width="60" height="60">
                            </div>
                        </td>
                        <td>{{ $teamMember->name }}</td>
                        <td>{{ $teamMember->designation }}</td>
                        <td>{{ $teamMember->about }}</td>
                        <td>
                            @if ($teamMember->status)
                                <a href="{{ route('teams.status', $teamMember->id) }}" onclick="return confirm('You want to change status?')"  class="chip green accent-5 white-text">Active</a>
                            @else
                                <a href="{{ route('teams.status', $teamMember->id) }}" onclick="return confirm('You want to change status?')"  class="chip red accent-1 white-text">Inactive</a>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('teams.edit', $teamMember->id) }}" class="mb-6 btn-floating waves-effect waves-light purple lightrn-1">
                                <i class="material-icons">edit</i>
                            </a>
                            <form method="POST" action="{{ route('teams.destroy', $teamMember->id) }}" style="display:inline;">
                                @csrf @method('DELETE')
                                <button class="mb-6 btn-floating waves-effect waves-light red accent-3" onclick="return confirm('Delete this member?')"><i class="material-icons">delete</i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">No member found :)</td>
                    </tr>
                    @endforelse
                    </tbody>
                </table>
                {{-- Pagination Links --}}
                <div class="pagination-content mt-1">
                    @if ($teamMembers->hasPages())
                    <ul class="pagination">
                        {{-- Previous Page Link --}}
                        @if ($teamMembers->onFirstPage())
                            <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                        @else
                            <li class="waves-effect">
                                <a href="{{ $teamMembers->previousPageUrl() }}"><i class="material-icons">chevron_left</i></a>
                            </li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($teamMembers->getUrlRange(1, $teamMembers->lastPage()) as $page => $url)
                            @if ($page == $teamMembers->currentPage())
                                <li class="active"><a href="#!">{{ $page }}</a></li>
                            @else
                                <li class="waves-effect"><a href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($teamMembers->hasMorePages())
                            <li class="waves-effect">
                                <a href="{{ $teamMembers->nextPageUrl() }}"><i class="material-icons">chevron_right</i></a>
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
