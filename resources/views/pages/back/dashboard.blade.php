@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col s12">
      <div class="container">
        <!--card stats start-->
        <div id="card-stats">
        <div class="row">
        <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text animate fadeLeft">
                <div class="padding-4">
                <div class="col s7 m6">
                    <i class="material-icons background-round mt-5">explore</i>
                </div>
                <div class="col s5 m6 right-align">
                    <h5 class="mb-0 white-text">{{ $data->services }}</h5>
                    <p class="no-margin">Total Services</p>
                </div>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text animate fadeLeft">
                <div class="padding-4">
                <div class="col s7 m6">
                    <i class="material-icons background-round mt-5">local_parking</i>
                </div>
                <div class="col s5 m6 right-align">
                    <h5 class="mb-0 white-text">{{ $data->projects }}</h5>
                    <p class="no-margin">Total Projects</p>
                </div>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text animate fadeLeft">
                <div class="padding-4">
                <div class="col s7 m6">
                    <i class="material-icons background-round mt-5">people</i>
                </div>
                <div class="col s5 m6 right-align">
                    <h5 class="mb-0 white-text">{{ $data->members }}</h5>
                    <p class="no-margin">Total Members</p>
                </div>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-green-teal gradient-shadow min-height-100 white-text animate fadeLeft">
                <div class="padding-4">
                <div class="col s7 m6">
                    <i class="material-icons background-round mt-5">comment</i>
                </div>
                <div class="col s5 m6 right-align">
                    <h5 class="mb-0 white-text">{{ $data->comments }}</h5>
                    <p class="no-margin">Total Testimonials</p>
                </div>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text animate fadeLeft">
                <div class="padding-4">
                <div class="col s7 m6">
                    <i class="material-icons background-round mt-5">thumbs_up_down</i>
                </div>
                <div class="col s5 m6 right-align">
                    <h5 class="mb-0 white-text">{{ $data->partners }}</h5>
                    <p class="no-margin">Total Partners</p>
                </div>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text animate fadeLeft">
                <div class="padding-4">
                <div class="col s7 m6">
                    <i class="material-icons background-round mt-5">art_track</i>
                </div>
                <div class="col s5 m6 right-align">
                    <h5 class="mb-0 white-text">{{ $data->articles }}</h5>
                    <p class="no-margin">Total Articles</p>
                </div>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text animate fadeLeft">
                <div class="padding-4">
                <div class="col s7 m6">
                    <i class="material-icons background-round mt-5">message</i>
                </div>
                <div class="col s5 m6 right-align">
                    <h5 class="mb-0 white-text">{{ $data->services }}</h5>
                    <p class="no-margin">New Query</p>
                </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        <!--card stats end-->
      </div>
    </div>
</div>
@endsection
