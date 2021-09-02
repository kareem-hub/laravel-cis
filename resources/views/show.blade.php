@extends('layouts.show')

@section('content')
@foreach ($users as $user)
    <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->user_post_type}}</td>
        <td>
        <form action="/{{$user->id}}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" class="btn btn-danger" value="Delete User">
        </form>
        </td>
    </tr>
@endforeach
@endsection
