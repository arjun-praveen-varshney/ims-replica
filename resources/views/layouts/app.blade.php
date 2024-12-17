<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        table, th, td { border: 1px solid black; border-collapse: collapse; }
        th, td { padding: 10px; text-align: center; }
        .sidebar { width: 200px; background: #f1f1f1; padding: 20px; position: fixed; height: 100%; }
        .main { margin-left: 220px; padding: 20px; }
        ul { list-style-type: none; padding: 0; }
        li a { display: block; padding: 10px; text-decoration: none; color: black; }
        li a:hover { background-color: #ddd; }
    </style>
</head>
<body>
    <div class="sidebar">
        <h3>Dashboard</h3>
        <ul>
            <li><a href="{{ route('internships.index') }}">Student Internships</a></li>
            <li><a href="{{ route('achievements.index') }}">Student Achievements</a></li>
        </ul>
    </div>

    <div class="main">
        @auth
        <h1>Welcome to the Dashboard, {{ Auth::user()->name }}</h1>
        @else
        <script>window.location = "{{ route('login') }}";</script>
        @endauth
        <p>Select a module from the sidebar to manage data.</p>
    </div>
</body>
</html>
