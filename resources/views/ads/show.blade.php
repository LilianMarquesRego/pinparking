@extends('layouts.app')

@section('header')
<style>
    #map {
        height: 400px;
        width: 100%;
    }
</style>
@endsection

@section('content')
<div class="row">
    <!-- left side of page-->
    <div class="col-lg-8">

        <div class="img-preview d-block shadow-lg rounded mb-4" target="_blank" href="#">
            <img class="img-fluid rounded" src="{{ asset($ad->image)}}" height="600" width="100%" alt="">
        </div>

        <div class="card border-0 mb-4">
            <div class="card-body">
                <p class="m-0">Description</p>
                <hr>
                <h5>{{ $ad->description }}</h5>
            </div>
        </div>

        <div>
            <div id="map"></div>
        </div>
    </div>

    <!-- right side of page  -->
    <div class="col-lg-4">
        <div class="card border-0 mb-4">
            <div class="card-body">
                <h3>$ {{ $ad->price }}/month</h3>
            </div>
        </div>

        <div class="card border-0 mb-4">
            <div id="address" class="text-muted card-body">{{ $ad->address }}</div>
        </div>

        <div class="card border-0 mb-4">
            <div id="phone" class="text-muted card-body">{{ $owner->phone }}</div>
        </div>

        <div class="card border-0 mb-4 d-none d-lg-block">
            <notification></notification>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    function initMap() {
        var space = {
            lat: {{ $ad->latitude }},
            lng: {{ $ad->longitude }}
        };

        var map = new google.maps.Map(
            document.getElementById('map'), {
                zoom: 18,
                center: space
            });

        var marker = new google.maps.Marker({
            position: space,
            map: map
        });
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=my_key&callback=initMap"></script>
@endsection 