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


<div class="container p-5">


    <div class="mb-3">
        <label for="" class="form-label">Product's Name</label>
        <input type="text" class="form-control" name="name" value = {{$product -> name}} disabled>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Product's Details</label>
        <textarea class="form-control" name="details" disabled>
            {{$product -> details}}
        </textarea>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Product's Image</label><br>

        <img src="/images/{{$product -> image}}" width="300px" style="margin: 5px">
  
    </div>

    

</div>

@endsection