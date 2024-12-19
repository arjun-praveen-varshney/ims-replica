@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
        <h1>Courses and Workshops</h1>

        <form method="GET" action="{{ route('programs.index') }}">
    <input type="text" name="search" placeholder="Search courses/workshops..." value="{{ request('search') }}">
    <button type="submit">Search</button>
</form>

<a href="{{ route('programs.create') }}">Add Course/Workshop</a>

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
                        <a href="{{ asset('storage/' . $courseWorkshop->document_path) }}" target="_blank">View Document</a>
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
                <td>
                    <a href="{{ route('programs.edit', $courseWorkshop->id) }}"><button>Edit</button></a>
                    <form action="{{ route('programs.destroy', $courseWorkshop->id) }}" method="POST" style="display:inline;">
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
