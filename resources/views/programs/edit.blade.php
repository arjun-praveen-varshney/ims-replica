@extends('layouts.app')

@section('title', 'Courses | Workshops')

@section('content')
<h1>Edit Course/Workshop</h1>
<form action="{{ route('programs.update', $program->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" value="{{ $program->title }}">
    </div>
    <div class="form-group">
        <label for="type">Type</label>
        <select name="type" class="form-control">
            <option value="course" {{ $program->type == 'course' ? 'selected' : '' }}>Course</option>
            <option value="workshop" {{ $program->type == 'workshop' ? 'selected' : '' }}>Workshop</option>
        </select>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control">{{ $program->description }}</textarea>
    </div>
    <div class="form-group">
        <label for="document">Upload Document</label>
        <input type="file" name="document" class="form-control">
    </div>
    <div class="form-group">
        <label for="duration">Duration</label>
        <input type="text" name="duration" class="form-control" value="{{ $program->duration }}">
    </div>
    <div class="form-group">
        <label for="start_date">Start Date</label>
        <input type="date" name="start_date" class="form-control" value="{{ $program->start_date }}">
    </div>
    <div class="form-group">
        <label for="end_date">End Date</label>
        <input type="date" name="end_date" class="form-control" value="{{ $program->end_date }}">
    </div>
    <div class="form-group">
        <label for="organized_by">Organized By</label>
        <input type="text" name="organized_by" class="form-control" value="{{ $program->organized_by }}">
    </div>
    <div class="form-group">
        <label for="location">Location</label>
        <input type="text" name="location" class="form-control" value="{{ $program->location }}">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection