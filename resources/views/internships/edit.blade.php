<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Internship</title>
</head>
<body>
    <h1>Edit Internship</h1>
    <form action="{{ route('internships.update', $internship->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="text" name="company" value="{{ $internship->company }}" required><br>
        <input type="text" name="duration" value="{{ $internship->duration }}" required><br>
        <textarea name="description" required>{{ $internship->description }}</textarea><br>
        <input type="file" name="document" accept=".pdf"><br>
        <button type="submit">Update Internship</button>
    </form>
    <a href="{{ route('internships.index') }}">Back to Internships</a>
</body>
</html>
