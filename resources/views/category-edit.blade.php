@extends('layouts.mainlayout')

@section('title', 'Edit Category')

@section('page-name', 'Edit Category')

@section('content')
   <h1>Add New Category</h1>
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

    <form action="/category-edit/{{ $category->slug }}" method="post">
        @csrf
        @method('put')
        <div>
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Category Name" value="{{ $category->name }}">
        </div>

        <div class="mt-1">
            <button class="btn btn-success" type="submit">Update</button>
        </div>
    </form>
   </div>
@endsection