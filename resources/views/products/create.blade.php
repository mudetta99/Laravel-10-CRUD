@extends('products.layout')



<style>
    form button{
        width: 100%;
        border-radius: 5px;
    }

    form button:hover{
        width: 100%;
        border-radius: 25px;
        color: #0b0a41;
    }
</style>

@section('title')
    Create Product
@endsection


@section('content')
    
{{-- <a href="{{route('products.index')}}">
    <button type="button" class="btn btn-primary">All Products</button>
</a> --}}

@if ($errors -> any())

    <div class="alert alert-danger">
        <ul>
            @foreach ($errors -> all() as $item)
                <li>{{$item}}</li>
            @endforeach
        </ul>

    </div>
    
@endif


<div class="container p-5">

<form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
@csrf
    <div class="mb-3">
        <label for="" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Enter name">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Details</label>
        <textarea class="form-control" name="details" placeholder="Enter description"></textarea>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Image</label>
        <input type="file" class="form-control" name="image">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

</form>
    

</div>

@endsection