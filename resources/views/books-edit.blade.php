@extends('layouts.mainlayout')

@section('title', 'Books')

@section('page-name', 'Edit Books')

@section('content')

   <h1>Edit Books</h1>
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

    <form action="/book-edit/{{ $book->slug }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="code" class="form-label">Code</label>
            <input type="text" name="book_code" id="code" class="form-control" placeholder="Book Code" value="{{ $book->book_code }}">
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Book Title" value="{{ $book->title }}">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" id="image">
        </div>

        <div class="mb-3">
            <label for="currentImage" class="form-label" style="display: block;">Current Image</label>
            <div class="w-25">

                @if ($book->cover!='')
                    <img src="{{ asset('/storage/cover/'.$book->cover) }}" alt="" width="300px">
                @else
                    <img src="{{ asset('image/no_cover.jpg') }}" alt="" width="300px">
                @endif

            </div>
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

        <div class="mb-3">
            <label for="currentCategory" class="form-label">Current Category</label>
            <ul>
                @foreach ($book->categories as $category)
                     <li>{{ $category->name }}</li>
                @endforeach
            </ul>
        </div>

        <div class="mt-1">
            <button class="btn btn-success" type="submit" class="form-control">Save</button>
        </div>
    </form>
   </div>
@endsection