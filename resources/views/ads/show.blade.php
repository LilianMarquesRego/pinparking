@extends('layouts.app')

@section('header')
    <link href="{{ asset('css/ads/index.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row">
      <!-- left side of page-->
        <div class="col-lg-8">

            <!-- image -->
            <div class="img-preview d-block shadow-lg rounded mb-4" target="_blank" href="#">
                <img class="img-fluid rounded" src="{{ asset($ad->image)}}" height="600" width="100%" alt="">
            </div>

            <!-- Description -->
            <div class="card border-0 shadow mb-4">
                <div class="card-body">
                    <p class="m-0">Description</p>
                    <hr> 
                    <h5>{{ $ad->description }}</h5>
                </div>
            </div>
        </div>

        <!-- right side of page  -->
        <div class="col-lg-4">

            <div class="card border-0 shadow mb-4">
                <div class="card-body">
                    <h3>$ {{ $ad->price }}/month</h3>
                </div>
            </div>

            <!-- address -->
            <div class="card border-0 shadow mb-4">
                <div id="ADDY" class="text-muted card-body" >{{ $ad->address }}</div>
                <div id="map">
                </div>
            </div>

            <!-- email -->
            <div class="card border-0 shadow mb-4 d-none d-lg-block">
                <div class="card-body">
                    <textarea style="width:100%; height:9em;"></textarea>
                    <hr>
                    <a class="btn btn-block btn-primary mb-3 py-3 text-white">Email
                    </a>
                </div>
            </div>

            <div class="card border-0 shadow mb-4">
            </div>
        </div>
     
    </div>
</div>
@endsection