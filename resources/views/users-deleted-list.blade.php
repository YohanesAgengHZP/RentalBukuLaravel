@extends('layouts.mainlayout')

@section('title', 'Deleted Users')

@section('page-name', 'User')

@section('content')
   <h1>Banned User List</h1>

    <div class="mt-3 d-flex justify-content-end">
        <a href="/users" class="btn btn-primary">Back</a>
    </div>

    <div class="mt-5">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
    </div>

   <div class="my-4">
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Username</th>
                <th>Phone</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($deletedUsers as $item)
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
                        <a href="users-restore/{{ $item->slug }}">UnBan User</a>
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>
   </div>
@endsection