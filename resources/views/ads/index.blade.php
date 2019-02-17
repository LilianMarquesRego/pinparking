@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($ads as $ad)
        {{-- {{dd($ad)}} --}}
            <div class="col-md-4">
                <div class="item-preview mb-5">
                    <a class="item-preview-img box-shadow-lg d-block mb-3" href="{{ route('ads.show', $ad->id) }}">
                        <img class="img-fluid" src="{{ $ad->image ? '/small/'.$ad->image : '/default/parking-space.jpg'}}" alt="parking slot">
                    </a>
                    <div class="item-preview-title">{{ $ad->address }}</div>
                    {{-- <div class="item-preview-description">{{ $ad->price, money_format('%.2n', $ad->price) }}</div> --}}
                    <div class="item-preview-description">$ {{ $ad->price }}</div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection