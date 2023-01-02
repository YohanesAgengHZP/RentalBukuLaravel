@extends('layouts.mainlayout')

@section('title', 'Delete Category')

@section('page-name', 'Delete Category')

@section('content')
   <h2> Are you sure you want to delete this category? {{ $category->name }}</h2>
   <div class="mt-3"> 
    <a href="/category-destroy/{{ $category->slug }}" class="btn btn-danger"> Sure</a>
    <a href="/categories" class="btn btn-info"> Cancel</a>
   </div>
@endsection