@extends('products.layout')

{{-- {!!$page = 'index'!!} --}}


<style>
    .view_image:hover{
        scale: 2.1;
        margin-left: 75px; 
        margin-top: 55px; 
    }

    .head{
        text-align: center;
    }
    .head:hover{
        letter-spacing: 2px;
    }
</style>


@section('title')
    All Products
@endsection

@section('content')
    
    <h1 class="head">All Products </h1> <br>

    {{-- <a href="{{route('products.create')}}">
        <button type="button" class="btn btn-primary">Create Product</button>
    </a>
    <br> --}}

    @if ( $message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{$message}}
        </div>
    @endif

    <table class="table table-hover">

        <thead>

          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Details</th>
            <th>Image</th>
            <th>Actions</th>
          </tr>

        </thead>

        <tbody>
            @foreach ($products as $item)
                
          <tr>
            <td>{{$item -> id}}</td>
            <td>{{$item -> name}}</td>
            <td>{{$item -> details}}</td>
            <td><img width="250px" src="/images/{{$item->image}}" alt="" srcset=""></td>
            <td>
                @auth
                    
                <form action="{{route('products.destroy', $item -> id)}}" method="post">
                    @csrf
                    @method('DELETE')

                                <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal {{$item -> id}}">
                Delete
            </button>
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModal {{$item -> id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title text text-danger" id="exampleModalLabel">Delete {{ $item -> name }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    Are You Sure about Deleting <p class="text text-danger">{!! $item -> name !!} ?</p>
                    <img class="view_image" src="/images/{{$item -> image}}" width="150px" >
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>

                    </div>
                </div>
                </div>
            </div>


                </form>

                <a class="btn btn-primary" href="{{route('products.edit', $item -> id)}}">Edit</a>

                @endauth

                <a class="btn btn-info"    href="{{route('products.show', $item -> id)}}">Show</a>

            </td>

          </tr>


            @endforeach

        
        </tbody>

      </table>

      {!! $products -> links() !!}
    
@endsection