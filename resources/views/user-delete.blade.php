@extends('layouts.mainlayout')

@section('title', 'Delete User')

@section('page-name', 'Delete Users')

@section('content')
   <h2> Are you sure you want to delete this user? {{ $user->username }}</h2>
   <div class="mt-3"> 
    <a href="/users-destroy/{{ $user->slug }}" class="btn btn-danger"> Sure</a>
    <a href="/users" class="btn btn-info"> Cancel</a>
   </div>
@endsection