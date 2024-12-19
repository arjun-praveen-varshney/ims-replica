@extends('layouts.app')

@section('title', 'Paper Publications')

@section('content')
<h1>Add Paper Publications</h1>
<form method="POST" action="{{ route('papers.update', $paper) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $paper->title }}">
        </div>
        <div class="form-group">
            <label for="publication_year">Publication Year</label>
            <input type="text" name="publication_year" class="form-control" value="{{ $paper->publication_year }}">
        </div>
        <div class="form-group">
            <label for="publisher">Publisher</label>
            <textarea name="publisher" class="form-control">{{ $paper->publisher }}</textarea>
        </div>
        <div class="form-group">
            <label for="paper_link">Paper Link</label>
            <input type="text" name="paper_link" class="form-control" value="{{ $paper->paper_link }}">
        </div>
        <div class="form-group">
            <label for="issue_no">ISBN/ISSN No.</label>
            <input type="text" name="issue_no" class="form-control" value="{{ $paper->issue_no }}">
        </div>
        <div class="form-group">
            <label for="name_of_conference">Name of Conference</label>
            <input type="text" name="name_of_conference" class="form-control" value="{{ $paper->name_of_conference }}">
        </div>
        <div class="form-group">
            <label for="indexing">Indexing</label>
            <input type="text" name="indexing" class="form-control" value="{{ $paper->indexing }}">
        </div>
        <div class="form-group">
            <label for="other_details">Other Details</label>
            <input type="text" name="other_details" class="form-control" value="{{ $paper->other_details }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection