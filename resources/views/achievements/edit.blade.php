@extends('layouts.app')

@section('title', 'Achievements')

@section('content')
    <h1>Edit Achievement</h1>
    <form action="{{ route('achievements.update', $achievement->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{ $achievement->title }}" required><br>
        <textarea name="description" required>{{ $achievement->description }}</textarea><br>
        <input type="file" name="document" accept=".pdf"><br>
        <button type="submit">Update Achievement</button>
    </form>
    <a href="{{ route('achievements.index') }}">Back to Achievements</a>
@endsection
