@extends('layouts.mainlayout')

@section('title', 'Books List')

@section('page-name', 'books')

@section('content')
    <div class="my-5">
        <div class="row">

            @foreach ($books as $item)
                
            <div class="col-lg-3 col-md-4 col-sm-6 mb-3 mr-4">
                <div class="card h-100">
                    <img class="card-img-top  w-50 mx-auto d-block mt-2" draggable="false"  src="{{ $item->cover != null ? asset('storage/cover/'.$item->cover) : asset('image/no_cover.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">{{ $item->book_code }}</h5>
                      <p class="card-text">{{ $item->title }}</p>
                      <p class="card-text text-right font-weight-bold {{ $item->status =='in stock' ? 'text-success':'text-danger' }}">
                        {{ $item->status }}
                        </p>
                    </div>
                </div>
            </div>

            @endforeach

        </div>
    </div>
@endsection