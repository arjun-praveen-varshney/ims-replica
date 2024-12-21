@extends('layouts.app')

@section('title', 'Paper Publications')

@section('content')
<div class="form-container" id="publication-form">
            <div class="form-header">
                <h2 class="form-title">Add Publication</h2>
                <a href="{{ route('papers.index') }}" class="back-btn">
                    <i class="fas fa-arrow-left"></i>
                    Back to Dashboard
                </a>
            </div>
<form method="POST" action="{{ route('papers.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="publication_year">Publication Year</label>
                <input type="number" name="publication_year" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="publisher">Publisher</label>
                <input type="text" name="publisher" class="form-control">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="paper_link">Paper Link</label>
                <input type="url" name="paper_link" class="form-control">
            </div>
            <div class="form-group">
                <label for="issue_no">ISBN/ISSN No.</label>
                <input type="text" name="issue_no" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="name_of_conference">Name of Conference / Journal</label>
            <input type="text" name="name_of_conference" class="form-control">
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="indexing">Indexing</label>
                <input type="text" name="indexing" class="form-control">
            </div>
            <div class="form-group">
                <label for="other_details">Other Details</label>
                <input type="text" name="other_details" class="form-control">
            </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Save Publication Details</button>
        </div>
    </form></div>
@endsection