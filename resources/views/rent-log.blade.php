@extends('layouts.mainlayout')

@section('title', 'Rent Log Page')

@section('content')
    <h1>Rent Log</h1>
{{-- {{ $rent_logs }} --}}
    <div class="mt-5">
        <x-rent-log-table :rentlog='$rent_logs'/>
       </div>
@endsection