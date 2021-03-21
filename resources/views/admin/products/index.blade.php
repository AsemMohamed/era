@extends('admin.index')
@section('content')
        <table class="table table-bordered bordered-bold table-striped text-center">
            <thead>
            <tr class="text-center">
                <th>id</th>
                <th>name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Image</th>
                <th class="inline-block">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->price}}</td>
                    <th width="2"><img src="{{url('/')}}/images/{{ $product->img }}" class="img-thumbnail"></th>
                    <th style="" class="inline-block">
                        <form style="text-align: center;"  action="{{route('products.destroy', $product->id)}}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                        </form>
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
   {{-- {!! $product->links() !!}--}}
  <div align="center">
        <a href="{{route('products.create')}}" class="btn btn-success btn-lg">Add New Product</a>
    </div>
    <br>
@endsection