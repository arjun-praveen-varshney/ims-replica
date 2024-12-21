@extends('layouts.app')

@section('title', 'Achievements')

@section('content')
<div id="achievements" class="content-card">
            <div class="card-header">
        <h2>Student Achievements</h2>
        <a href="{{ route('achievements.create') }}" class="create-btn">
                    <i class="fas fa-plus"></i>
                    Add Achievement
                </a>
                </div>
        <!-- Achievements Table -->
         <div class="table-container">
        <table>
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
                    <a href="{{ asset('storage/' . $achievement->document_path) }}" style="text-decoration:none; color:blue;" target="_blank">View</a>
                @else
                    No Document
                @endif
            </td>
            <td style="display: flex;">
                <a href="{{ route('achievements.edit', $achievement->id) }}">
                    <button class="action-btn edit-btn"><i class="fas fa-edit" style="margin-right:8px;"></i>Edit</button>
                </a>
                <form action="{{ route('achievements.destroy', $achievement->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="action-btn delete-btn"><i class="fas fa-trash" style="margin-right:8px;"></i>Delete</button>
                </form>
            </td>
        </tr>
        @endif
    @endforeach
</tbody>
        </table></div></div>
@endsection
