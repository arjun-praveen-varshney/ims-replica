@extends('layouts.app')

@section('title', 'Paper Publications')

@section('content')
        <h1>Paper Publications</h1>

        <form method="GET" action="{{ route('papers.index') }}">
            <input type="text" name="search" placeholder="Search paper publications..." value="{{ request('search') }}">
            <button type="submit">Search</button>
        </form>
        
        <a href="{{ route('papers.create') }}">Add Paper Publication</a>

<table>
    <thead>
        <tr>
            <th>Sr.</th>
            <th>Title</th>
            <th>Publication Year</th>
            <th>Publisher</th>
            <th>Paper link</th>
            <th>ISBN/ISSN NO.</th>
            <th>Name of Conference</th>
            <th>Indexing</th>
            <th>Other</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($papers as $key => $paperPublication)
        @if($paperPublication->user_id === auth()->id())
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $paperPublication->title }}</td>
                <td>{{ $paperPublication->publication_year }}</td>
                <td>{{ $paperPublication->publisher }}</td>
                <td>
                    @if($paperPublication->paper_link)
                        <a href="{{ $paperPublication->paper_link }}" target="_blank">View Paper</a>
                    @else
                        N/A
                    @endif
                </td>
                <td>{{ $paperPublication->issue_no }}</td>
                <td>{{ $paperPublication->name_of_conference }}</td>
                <td>{{ $paperPublication->indexing }}</td>
                <td>{{ $paperPublication->other_details }}</td>
                <td>
                    <a href="{{ route('papers.edit', $paperPublication->id) }}"><button>Edit</button></a>
                    <form method="POST" action="{{ route('papers.destroy', $paperPublication->id) }}" style="display:inline;">
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
