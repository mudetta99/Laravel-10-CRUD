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
    
<a href="{{route('products.index')}}">
    <button type="button" class="btn btn-primary">All Products</button>
</a>

@if ($errors -> any())

    <div class="alert alert-danger">
        <ul>
            @foreach ($errors as $item)
                <li>{{$item}}</li>
            @endforeach
        </ul>

    </div>
    
@endif


<div class="container p-5">

<form action="{{route('products.update', $product -> id)}}" method="post" enctype="multipart/form-data">
@csrf
@method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" value = {{$product -> name}}>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Details</label>
        <textarea class="form-control" name="details" >
            {{$product -> details}}
        </textarea>
    </div>

    <div class="mb-3">
        <img src="/images/{{$product -> image}}" width="300px"><br>
        <label for="" class="form-label">Image</label>
        <input type="file" class="form-control" name="image">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

</form>
    

</div>

@endsection