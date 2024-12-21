@extends('layouts.app')

@section('title', 'Courses | Workshops')

@section('content')
<div id="courses" class="content-card">
            <div class="card-header">
                <h2>Student Courses and Workshops</h2>
                <a href="{{ route('programs.create') }}" class="create-btn">
                    <i class="fas fa-plus"></i>
                    Add Course/Workshop
                </a>
            </div>
            <div class="table-container">

<table>
    <thead>
        <tr>
            <th>Sr.</th>
            <th>Title</th>
            <th>Description</th>
            <th>Document</th>
            <th>Duration</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Location</th>
            <th>Organized By</th>
            <th>Type</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($programs as $key => $courseWorkshop)
        @if($courseWorkshop->user_id === auth()->id())
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $courseWorkshop->title }}</td>
                <td>{{ $courseWorkshop->description }}</td>
                <td>
                    @if($courseWorkshop->document_path)
                        <a href="{{ asset('storage/' . $courseWorkshop->document_path) }}" target="_blank" style="text-decoration: none; color: blue;">View Document</a>
                    @else
                        No Document
                    @endif
                </td>
                <td>{{ $courseWorkshop->duration }}</td>
                <td>{{ $courseWorkshop->start_date }}</td>
                <td>{{ $courseWorkshop->end_date }}</td>
                <td>{{ $courseWorkshop->location }}</td>
                <td>{{ $courseWorkshop->organized_by }}</td>
                <td>{{ $courseWorkshop->type }}</td>
                <td style="display: flex;">
                <a href="{{ route('programs.edit', $courseWorkshop->id) }}">
                    <button class="action-btn edit-btn"><i class="fas fa-edit" style="margin-right:8px;"></i>Edit</button>
                </a>
                <form action="{{ route('programs.destroy', $courseWorkshop->id) }}" method="POST">
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
