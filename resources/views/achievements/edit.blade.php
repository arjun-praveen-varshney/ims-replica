@extends('layouts.app')

@section('title', 'Achievements')

@section('content')
<div class="form-container" id="achievement-form">
<div class="form-header">
                <h2 class="form-title">Edit Achievement</h2>
                <a href="{{ route('achievements.index') }}" class="back-btn">
                    <i class="fas fa-arrow-left"></i>
                    Back to Dashboard
                </a>
            </div>
    <form action="{{ route('achievements.update', $achievement->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Title</label>
        <input type="text" name="title" class="form-control" value="{{ $achievement->title }}" required>
        </div>
        <div class="form-group">
            <label>Description</label>
        <textarea name="description" class="form-control" required>{{ $achievement->description }}</textarea>
        </div>
        <div class="form-group">
            <label>Document</label>
            <div class="file-input">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <p>Drag and drop your file here or click to browse</p>
        <input type="file" style="display: none;" id="achievement-file" name="document" accept=".pdf"></div></div>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Update Achievement</button>
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
