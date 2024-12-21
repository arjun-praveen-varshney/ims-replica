@extends('layouts.app')

@section('title', 'Internships')

@section('content')
<div class="form-container" id="internship-form">
            <div class="form-header">
                <h2 class="form-title">Edit Internship</h2>
                <a href="{{ route('internships.index') }}" class="back-btn">
                    <i class="fas fa-arrow-left"></i>
                    Back to Internships
                </a>
            </div>
            <form action="{{ route('internships.update', $internship->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-row">
                    <div class="form-group">
                        <label>Company</label>
        <input type="text" class="form-control" name="company" value="{{ $internship->company }}" required>
        </div>
        <div class="form-group">
<label>Duration</label>
<input type="text" class="form-control" name="duration" value="{{ $internship->duration }}" required>
</div></div>
<div class="form-group">
    <label>Description</label>
    <textarea name="description" class="form-control" placeholder="Description" required>{{ $internship->description }}</textarea>
</div>
<div class="form-group">
    <label>Document</label>
    <div class="file-input">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <p>Drag and drop your file here or click to browse</p>
                        <input type="file" name="document" style="display: none;" id="internship-file" accept=".pdf">
                    </div>
</div>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Update Internship</button>
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
