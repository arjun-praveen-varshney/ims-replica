<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Internship</title>
</head>
<body>
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
</body>
</html>
