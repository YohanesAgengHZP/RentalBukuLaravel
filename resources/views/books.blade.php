@extends('layouts.mainlayout')

@section('title', 'Books Page')

@section('page-name', 'books')

@section('content')
    <h1>Books List</h1>

    <div class="mt-5 d-flex justify-content-end">
        <a href="book-deleted" class="btn btn-secondary mr-3"> View Deleted Data</a>
        <a href="books-add" class="btn btn-primary"> Add Data</a>
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
                    <th>Book Code</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($book as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->book_code }}</td>
                        <td>{{ $item->title }}</td>
                        <td>
                            @foreach ($item->categories as $category)
                                {{$category->name }} <br>
                            @endforeach
                        </td>
                        <td>{{ $item->status }}</td>

                        <td>
                            <a href="/book-edit/{{ $item->slug }}">Edit</a>
                            <a href="/book-delete/{{ $item->slug }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
       </div>
@endsection