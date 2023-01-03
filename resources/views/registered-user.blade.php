@extends('layouts.mainlayout')

@section('title', 'User Page')

@section('page-name', 'Registered profile')

@section('content')
    <h1>New Registered/Inactive User List</h1>

    <div class="mt-5 d-flex justify-content-end">
        <a href="/users" class="btn btn-primary"> Approved Registered User</a>
    </div>

    <div class="my-4">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Username</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($registeredUsers as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->username }}</td>
                    <td>
                        @if ($item->phone)
                            {{ $item ->phone}}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <a href="/users-detail/{{ $item->slug }}">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
   </div>
@endsection