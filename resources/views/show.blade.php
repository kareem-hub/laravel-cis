@extends('layouts.show')

@section('content')
@foreach ($users as $user)
    <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->user_post_type}}</td>
    </tr>
@endforeach
@endsection
