@extends('layouts.main')

@section('content')
    <h1>All Reviews</h1>

    <p>List of all game reviews.</p>

    <a href="{{ route('reviews.create') }}">Create New Review</a>
@endsection