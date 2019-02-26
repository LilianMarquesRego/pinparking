@extends('layouts.app')

@section('content')
    <div class="row">
        <!-- left side of page-->
        <div class="col-lg-8">

            <!-- image -->
            <div class="img-preview d-block shadow-lg rounded mb-4" target="_blank" href="#">
                <img class="img-fluid rounded" src="{{ asset($ad->image)}}" height="600" width="100%" alt="">
            </div>

            <!-- Description -->
            <div class="card border-0 mb-4">
                <div class="card-body">
                    <p class="m-0">Description</p>
                    <hr>
                    <h5>{{ $ad->description }}</h5>
                </div>
            </div>
        </div>

        <!-- right side of page  -->
        <div class="col-lg-4">

            <div class="card border-0 mb-4">
                <div class="card-body">
                    <h3>$ {{ $ad->price }}/month</h3>
                </div>
            </div>

            <!-- address -->
            <div class="card border-0 mb-4">
                <div id="ADDY" class="text-muted card-body">{{ $ad->address }}</div>
                <div id="map">
                </div>
            </div>

            <!-- address -->
            <div class="card border-0 mb-4">
                <div id="" class="text-muted card-body">{{ $owner->phone }}</div>
                <div id="phone">
                </div>
            </div>

            <!-- email -->
            <div class="card border-0 mb-4 d-none d-lg-block">
                <send-email></send-email>
            </div>

            <div class="card border-0 mb-4">
            </div>
        </div>
    </div>
@endsection 