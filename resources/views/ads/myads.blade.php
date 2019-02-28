@extends('layouts.app')

@section('content')
<my-list :data="{{ $ads }}"></my-list>

@endsection 