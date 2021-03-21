@extends('admin.index')
@section('content')

    <form class="form-horizontal" method="post" action="{{route('products.store') }}" enctype="multipart/form-data">
        {{--@csrf--}} {{ csrf_field() }}
        <div class="form-group">
            <label class="col-md-4 text-right">Name</label>
            <div class="col-md-4">
                <input type="text" name="name" class="form-control input-lg">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 text-right">Description</label>
            <div class="col-md-4">
                <input type="text" name="description" class="form-control input-lg">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 text-right">Price</label>
            <div class="col-md-4">
                <input type="text" name="price" class="form-control input-lg">
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputFile" class="col-md-4 text-right">File input</label>
            <input type="file" name="img" id="exampleInputFile" class="col-md-8">
            <p class="help-block">Example block-level help text here.</p>
        </div>
        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-primary btn-lg" class="col-md-8" href="{{route('products.index') }}">Save</button>
            <a href="{{route('products.index') }}" class="btn btn-danger btn-lg">back</a>
        </div>

    </form>
    <br>
    <br>
    </div>
@endsection