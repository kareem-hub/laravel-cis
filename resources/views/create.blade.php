@extends('layouts.create')
@section('content')
<center>
    @if (session()->has('msg'))
    @if (str_contains(session('msg') ,'New'))
    <div class="alert-success col-sm-4">{{session('msg')}}</div>
    @else
    <div class="alert-danger col-sm-4">{{session('msg')}}</div>
    @endif
    @endif
    <h1 class="text-center col-12">Create A New User</h1>

    <form action="/create" method="post" role="form" class="form-horizontal container mt-5">
        @csrf
        <div class="form-group">
            <div class="col-sm-5">
                <input class="form-control" name="id" placeholder="Id" type="number">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-5">
                <input class="form-control" name="name" placeholder="Name" type="text">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-5">
                <input class="form-control" name="postType" placeholder="Post Type" type="text">
            </div>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Create">
            <input type="reset" class="btn btn-light btn-radius btn-brd grd1 ml-5" value="reset">
            <a class="btn btn-primary ml-5" href="/">Go Back</a>
        </div>
    </form>
</center>
@endsection
