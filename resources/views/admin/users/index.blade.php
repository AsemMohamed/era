@extends('admin.index')
@section('content')
   <table class="table table-bordered bordered-bold table-striped text-center">
        <thead>
        <tr class="text-center">
            <th>id</th>
            <th>name</th>
            <th>Email</th>
            <th>Phone</th>
            <th class="inline-block">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->created_at->diffForHumans()}}</td>
                <td>{{$user->updated_at->diffForHumans()}}</td>
                {{--<th style="" class="inline-block">

                    <form style="text-align: center;"  action="{{route('users.destroy', $user->id)}}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <a href="{{route('users.edit', $user->id)}}" class="btn btn-warning">Edit</a>
                        <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                    </form>
                </th>--}}
            </tr>
        @endforeach
        </tbody>
    </table>
  </div>
@endsection