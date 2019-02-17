@extends('admin.layouts.app') 

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
    
                <div class="form-group" style="margin-bottom:1.5rem">
                    <label for="image">Upload an image</label>
                    <input type="file" class="form-control-file" id="image" name="image" >
                </div>

                <button type="submit" class="btn btn-primary px-4">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection