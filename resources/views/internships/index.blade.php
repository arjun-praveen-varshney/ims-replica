@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
        <h1>Student Internships</h1>
        <form method="GET" action="{{ route('internships.index') }}">
    <div class="input-group mb-3">
        <input 
            type="text" 
            name="search" 
            class="form-control" 
            placeholder="Search internships..." 
            value="{{ request('search') }}"
        >
        <button class="btn btn-primary" type="submit">Search</button>
    </div>
</form>


        <a href="{{ route('internships.create') }}">Add Internship</a>

        <!-- Internships Table -->
        <table style="width:100%; margin-top: 20px;">
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
                            <a href="{{ asset('storage/' . $internship->document_path) }}" target="_blank">View</a>
                        @else
                            No Document
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('internships.edit', $internship->id) }}">
                            <button>Edit</button>
                        </a>
                        <form action="{{ route('internships.destroy', $internship->id) }}" method="POST" style="display:inline;">
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
