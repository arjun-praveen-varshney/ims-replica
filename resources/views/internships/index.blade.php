@extends('layouts.app')

@section('title', 'Internships')

@section('content')
<div id="internships" class="content-card">
            <div class="card-header">
        <h2>Student Internships</h2>
        <a href="{{ route('internships.create') }}" class="create-btn"><i class="fas fa-plus"></i>Add Internship</a>
    </div>

        <!-- Internships Table -->
         <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Sr</th>
                    <th>Company</th>
                    <th>Duration</th>
                    <th>Description</th>
                    <th>Document</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($internships as $key => $internship)
                @if($internship->user_id === auth()->id())
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $internship->company }}</td>
                    <td>{{ $internship->duration }}</td>
                    <td>{{ $internship->description }}</td>
                    <td>
                        @if($internship->document_path)
                            <a href="{{ asset('storage/' . $internship->document_path) }}" target="_blank" style="text-decoration:none; color: blue;">View</a>
                        @else
                            No Document
                        @endif
                    </td>
                    <td style="display: flex;">
                <a href="{{ route('internships.edit', $internship->id) }}">
                    <button class="action-btn edit-btn"><i class="fas fa-edit" style="margin-right:8px;"></i>Edit</button>
                </a>
                <form action="{{ route('internships.destroy', $internship->id) }}" method="POST">
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
