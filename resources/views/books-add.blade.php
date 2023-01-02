@extends('layouts.mainlayout')

@section('title', 'Books')

@section('page-name', 'Add Books')

@section('content')

   <h1>Add New Books</h1>
   <div class="mt-3 w-50">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="books-add" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="code" class="form-label">Code</label>
            <input type="text" name="book_code" id="code" class="form-control" placeholder="Book Code" value="{{ old('book_code') }}">
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Book Title" value="{{ old('title') }}">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" id="image">
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select name="categories" id="category" class="form-control">
                <option value="">Choose Category</option>

                @foreach ($categories as $item)
                    <option value="{{ $item->id}}">{{ $item->name }} </option>
                @endforeach

            </select>
        </div>

        <div class="mt-1">
            <button class="btn btn-success" type="submit" class="form-control">Save</button>
        </div>
    </form>
   </div>
@endsection