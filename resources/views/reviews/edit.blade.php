@extends('layouts.main')

@section('content')

    <!-- PAGE HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Edit Review</h2>
    </div>

    <!-- FORM CARD -->
    <div class="card shadow-sm p-4">
        <form action="{{ route('reviews.update', $review->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('reviews._form')
        </form>
    </div>

@endsection