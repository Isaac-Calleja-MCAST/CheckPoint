@extends('layouts.main')

@section('content')
    <h1>All Bookmarks</h1>

    <p>List of all game bookmarks.</p>

    <a href="{{ route('bookmarks.create') }}">Create New Bookmark</a>
@endsection