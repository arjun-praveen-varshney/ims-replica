@extends('layouts.app')

@section('title', 'Courses | Workshops')

@section('content')
<div class="form-container" id="course-form">
            <div class="form-header">
                <h2 class="form-title">Edit Course/Workshop</h2>
                <a href="{{ route('programs.index') }}" class="back-btn">
                    <i class="fas fa-arrow-left"></i>
                    Back to Dashboard
                </a>
            </div>
<form action="{{ route('programs.update', $program->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-row">
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
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control">{{ $program->description }}</textarea>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" class="form-control" value="{{ $program->start_date }}">
        </div>
        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" name="end_date" class="form-control" value="{{ $program->end_date }}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label for="duration">Duration</label>
            <input type="text" name="duration" class="form-control" value="{{ $program->duration }}">
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location" class="form-control" value="{{ $program->location }}">
        </div>
    </div>
    <div class="form-group">
        <label for="organized_by">Organized By</label>
        <input type="text" name="organized_by" class="form-control" value="{{ $program->organized_by }}">
    </div>
    <div class="form-group">
        <label for="document">Upload Document</label>
        <div class="file-input">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <p>Drag and drop your file here or click to browse</p>
                        <input type="file" style="display: none" id="course-file" name="document">
                    </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form></div>
    <script>
        // File input handling
        document.querySelectorAll('.file-input').forEach(fileInput => {
            const realInput = fileInput.querySelector('input[type="file"]');
            
            fileInput.addEventListener('click', () => {
                realInput.click();
            });

            realInput.addEventListener('change', () => {
                const file = realInput.files[0];
                if (file) {
                    const p = fileInput.querySelector('p');
                    p.textContent = `Selected file: ${file.name}`;
                }
            });
        });
        </script>
@endsection