<?php

namespace App\Http\Controllers;

use App\Models\Paper;
use Illuminate\Http\Request;

class PaperController extends Controller
{
    // Display a listing of the paper publications
    public function index(Request $request)
    {
        // Check if there is a search query
        $query = Paper::query();

        // If there's a search query, filter by title or abstract
        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('publisher', 'like', '%' . $request->search . '%');
        }

        // Get the filtered list of paper publications
        $papers = $query->get();

        // Return the view with the paper publications data
        return view('papers.index', compact('papers'));
    }

    // Show the form for creating a new paper publication
    public function create()
    {
        return view('papers.create');
    }

    // Store a newly created paper publication in storage
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'publisher' => 'required|string|max:255',
        'name_of_conference' => 'nullable|string|max:255',
        'indexing' => 'nullable|string|max:255',
        'publication_year' => 'required|integer',
        'paper_link' => 'nullable|url|max:255',
        'issue_no' => 'nullable|string|max:255',
        'other_details' => 'nullable|string',
    ]);

    Paper::create([
        'title' => $request->title,
        'publisher' => $request->publisher,
        'name_of_conference' => $request->name_of_conference,
        'indexing' => $request->indexing,
        'publication_year' => $request->publication_year,
        'paper_link' => $request->paper_link,
        'issue_no' => $request->issue_no,
        'other_details' => $request->other_details,
        'user_id' => auth()->id(), // Correctly assign user ID
    ]);

    return redirect()->route('papers.index');
}

    // Show the form for editing the specified paper publication
    public function edit(Paper $paper)
    {
        return view('papers.edit', compact('paper'));
    }

    // Update the specified paper publication in storage
    public function update(Request $request, Paper $paper)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'name_of_conference' => 'nullable|string|max:255',
            'indexing' => 'nullable|string|max:255',
            'publication_year' => 'required|integer',
            'paper_link' => 'nullable|url|max:255',
            'issue_no' => 'nullable|string|max:255',
            'other_details' => 'nullable|string',
        ]);

        $paper->update([
            'title' => $request->title,
            'publisher' => $request->publisher,
            'name_of_conference' => $request->name_of_conference,
            'indexing' => $request->indexing,
            'publication_year' => $request->publication_year,
            'paper_link' => $request->paper_link,
            'issue_no' => $request->issue_no,
            'other_details' => $request->other_details,
        ]);

        return redirect()->route('papers.index');
    }

    // Remove the specified paper publication from storage
    public function destroy(Paper $paper)
    {
        $paper->delete();
        return redirect()->route('papers.index');
    }
}
