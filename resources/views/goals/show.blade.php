@extends('layouts.main')

@section('content')
    <h1>Goal Details</h1>

    <p>Details of the selected goal will appear here.</p>

    <a href="{{ route('goals.index') }}">Back to Goals List</a>
@endsection