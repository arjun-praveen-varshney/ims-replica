<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Achievements</title>
    <style>
        table, th, td { border: 1px solid black; border-collapse: collapse; }
        th, td { padding: 10px; text-align: center; }
        .sidebar { width: 200px; background: #f1f1f1; padding: 20px; position: fixed; height: 100%; }
        .main { margin-left: 220px; padding: 20px; }
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
        <h1>Student Achievements</h1>

        <a href="{{ route('achievements.create') }}">Add Achievement</a>

        <!-- Achievements Table -->
        <table style="width:100%; margin-top: 20px;">
            <thead>
                <tr>
                    <th>Sr</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Document</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($achievements as $key => $achievement)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $achievement->title }}</td>
                    <td>{{ $achievement->description }}</td>
                    <td>
                        @if($achievement->document_path)
                            <a href="{{ asset('storage/' . $achievement->document_path) }}" target="_blank">View</a>
                        @else
                            No Document
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('achievements.edit', $achievement->id) }}">
                            <button>Edit</button>
                        </a>
                        <form action="{{ route('achievements.destroy', $achievement->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
