@extends('layouts.app')

@section('content')
<div class="container mb-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">

            <h3 class="text-center">Post Ad</h3>

            <form action="{{ route('ads.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" id="price" name="price">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address">
                </div>

                <div class="form-group d-none">
                    <label for="latitude">Latitude</label>
                    <input type="text" class="form-control" id="latitude" name="latitude">
                </div>

                <div class="form-group d-none">
                    <label for="longitude">Longitude</label>
                    <input type="text" class="form-control" id="longitude" name="longitude">
                </div>

                <div class="form-group" style="margin-bottom:1.5rem">
                    <label for="image">Upload an image</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>

                <button type="submit" class="btn btn-primary px-4">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    let autocomplete;

    function initAutocomplete() {
        let input = document.getElementById('address');

        let cityBounds = new google.maps.LatLngBounds(
            new google.maps.LatLng(42.9585673, -81.3050062),
            new google.maps.LatLng(43.0308718, -81.2081544)
        );

        let options = {
            bounds: cityBounds,
            types: ['geocode'],
            componentRestrictions: {
                country: "ca"
            }
        };

        autocomplete = new google.maps.places.Autocomplete(input, options);

        autocomplete.setFields(['geometry']);

        autocomplete.addListener('place_changed', fillInAddress);
    }

    function fillInAddress() {
        document.getElementById('latitude').value = autocomplete.getPlace().geometry.location.lat();
        document.getElementById('longitude').value = autocomplete.getPlace().geometry.location.lng();
    }
</script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=my_key&libraries=places&callback=initAutocomplete"></script>
@endsection 