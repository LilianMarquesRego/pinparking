@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($ads as $ad)
            <div class="col-md-4">
                <div class="item-preview mb-5">
                    <a class="item-preview-img box-shadow-lg d-block mb-3" href="{{ route('ads.show', $ad->id) }}">
                        <img class="img-fluid" src="https://via.placeholder.com/600x400.png?text=Parking+slot" alt="parking slot">
                    </a>
                    <div class="item-preview-title">{{ $ad->address }}</div>
                    <div class="item-preview-description">{{ $ad->price }}</div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection