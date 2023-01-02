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
        <h2>Rent Logs</h2>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">User</th>
                <th scope="col">Book Title</th>
                <th scope="col">Rent Date</th>
                <th scope="col">Return Date</th>
                <th scope="col">Actual Return Date</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
              </tr>
            </tbody>
          </table>
    </div>
@endsection