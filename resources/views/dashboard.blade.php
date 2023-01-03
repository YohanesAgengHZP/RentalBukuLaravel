@extends('layouts.mainlayout')

@section('title', 'Dashboard')

@section('page-name', 'dashboard')

@section('content')

    <h1>Welcome, {{ Auth::user()->username }}</h1>

    <div class="row">
        <div class="col-lg-4">
            <div class="card-data books">
                <div class="row">
                    <div class="col"><i class="bi bi-journal-bookmark"></i></div>
                    <div class="col d-flex flex-column justify-content-center align-items-end">
                        <div class="card-desc">Books</div>
                        <div class="card-total">{{ $book_count }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card-data category">
                <div class="row">
                    <div class="col"><i class="bi bi-list-stars"></i></div>
                    <div class="col d-flex flex-column justify-content-center align-items-end">
                        <div class="card-desc">Category</div>
                        <div class="card-total">{{ $category_count }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card-data user">
                <div class="row">
                    <div class="col"><i class="bi bi-person"></i></div>
                    <div class="col d-flex flex-column justify-content-center align-items-end">
                        <div class="card-desc">Users</div>
                        <div class="card-total">{{ $user_count }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h2>Rent Logs User</h2>
        <x-rent-log-table :rentlog='$rent_logs'/>
    </div>
@endsection