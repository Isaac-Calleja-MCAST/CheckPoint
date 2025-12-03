@extends('layouts.main')

@section('content')
    <h1>Review Details</h1>

    <p>Details of the selected review will appear here.</p>

    <a href="{{ route('reviews.index') }}">Back to Reviews List</a>
@endsection