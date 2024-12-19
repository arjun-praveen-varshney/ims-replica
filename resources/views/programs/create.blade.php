@extends('layouts.app')

@section('title', 'Courses | Workshops')

@section('content')
    <h1>Add Course/Workshop</h1>

    <form method="POST" action="{{ route('programs.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" class="form-control" required>
                <option value="course">Course</option>
                <option value="workshop">Workshop</option>
            </select>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="document">Upload Document</label>
            <input type="file" name="document" class="form-control">
        </div>
        <div class="form-group">
            <label for="duration">Duration</label>
            <input type="text" name="duration" class="form-control">
        </div>
        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" class="form-control">
        </div>
        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" name="end_date" class="form-control">
        </div>
        <div class="form-group">
            <label for="organized_by">Organized By</label>
            <input type="text" name="organized_by" class="form-control">
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
