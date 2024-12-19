@extends('layouts.app')

@section('title', 'Achievements')

@section('content')
        <h1>Student Achievements</h1>
        <form method="GET" action="{{ route('achievements.index') }}">
    <div class="input-group mb-3">
        <input 
            type="text" 
            name="search" 
            class="form-control" 
            placeholder="Search achievements..." 
            value="{{ request('search') }}"
        >
        <button class="btn btn-primary" type="submit">Search</button>
    </div>
</form>

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
        @if($achievement->user_id === auth()->id())
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
        @endif
    @endforeach
</tbody>
        </table>
@endsection
