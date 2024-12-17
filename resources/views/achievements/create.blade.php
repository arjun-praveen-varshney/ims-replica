<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Achievement</title>
</head>
<body>
    <h1>Add Achievement</h1>
    <form action="{{ route('achievements.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="Title" required><br>
        <textarea name="description" placeholder="Description" required></textarea><br>
        <input type="file" name="document" accept=".pdf"><br>
        <button type="submit">Add Achievement</button>
    </form>
    <a href="{{ route('achievements.index') }}">Back to Achievements</a>
</body>
</html>
