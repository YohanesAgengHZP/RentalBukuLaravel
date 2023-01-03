@extends('layouts.mainlayout')

@section('title', 'User Page')

@section('page-name', 'Registered profile')

@section('content')
    <h1>Detail User</h1>

    <div class="mt-5 d-flex justify-content-end">
        @if ($user->status == 'Inactive')
            <a href="/users-approve/{{ $user->slug }}" class="btn btn-info"> Approved Registered User</a>        
        @endif
    </div>

    <div class="mt-5">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
    </div>

    <div class="detail-content my-4 w-25">
        <div class="mb-3">
            <label for="" class="form-label"> Username</label>
            <input type="text" name="" id="" class="form-control" readonly value="{{ $user->username }}">
        </div>

        <div class="mb-3">
            <label for="" class="form-label"> Phone Number</label>
            <input type="text" name="" id="" class="form-control" readonly value="{{ $user->phone }}">
        </div>

        <div class="mb-3">
            <label for="" class="form-label"> Address</label>
            <textarea name="" id="" cols="30" rows="7" class="form-control" style="resize: none" readonly>{{ $user->address }}</textarea>
        </div>

        <div class="mb-3">
            <label for="" class="form-label"> Status</label>
            <input type="text" name="" id="" class="form-control" readonly value="{{ $user->status }}">
        </div>
        
   </div>
@endsection