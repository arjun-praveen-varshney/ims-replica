@extends('layouts.app')

@section('title', 'Paper Publications')

@section('content')
<div id="publications" class="content-card">
            <div class="card-header">
                <h2>Student Paper Publications</h2>
                <a href="{{ route('papers.create') }}" class="create-btn">
                    <i class="fas fa-plus"></i>
                    Add Publication
                </a>
            </div>
            <div class="table-container">

<table>
    <thead>
        <tr>
            <th>Sr.</th>
            <th>Title</th>
            <th>Publication Year</th>
            <th>Publisher</th>
            <th>Paper link</th>
            <th>ISBN/ISSN NO.</th>
            <th>Name of Conference / Journal</th>
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
                        <a href="{{ $paperPublication->paper_link }}" target="_blank" style="text-decoration: none; color: blue;">View Paper</a>
                    @else
                        N/A
                    @endif
                </td>
                <td>{{ $paperPublication->issue_no }}</td>
                <td>{{ $paperPublication->name_of_conference }}</td>
                <td>{{ $paperPublication->indexing }}</td>
                <td>{{ $paperPublication->other_details }}</td>
                <td style="display: flex;">
                <a href="{{ route('papers.edit', $paperPublication->id) }}">
                    <button class="action-btn edit-btn"><i class="fas fa-edit" style="margin-right:8px;"></i>Edit</button>
                </a>
                <form action="{{ route('papers.destroy', $paperPublication->id) }}" method="POST">
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
