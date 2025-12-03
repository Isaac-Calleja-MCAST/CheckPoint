@extends('layouts.main')

@section('content')
    <h1>All Guides</h1>

    <p>List of all game guides.</p>

    <a href="{{ route('guides.create') }}">Create New Guide</a>
@endsection