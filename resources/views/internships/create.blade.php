@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1>Add Internship</h1>
    <form action="{{ route('internships.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="company" placeholder="Company" required><br>
        <input type="text" name="duration" placeholder="Duration" required><br>
        <textarea name="description" placeholder="Description" required></textarea><br>
        <input type="file" name="document" accept=".pdf"><br>
        <button type="submit">Add Internship</button>
    </form>
    <a href="{{ route('internships.index') }}">Back to Internships</a>
@endsection
