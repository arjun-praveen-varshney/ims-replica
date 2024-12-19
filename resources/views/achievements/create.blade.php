@extends('layouts.app')

@section('title', 'Achievements')

@section('content')
    <h1>Add Achievement</h1>
    <form action="{{ route('achievements.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="Title" required><br>
        <textarea name="description" placeholder="Description" required></textarea><br>
        <input type="file" name="document" accept=".pdf"><br>
        <button type="submit">Add Achievement</button>
    </form>
    <a href="{{ route('achievements.index') }}">Back to Achievements</a>
@endsection
