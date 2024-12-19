<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    public function index(Request $request)
    {
        // Check if there is a search query
        $query = Program::query();

        // If there's a search query, filter by title or description
        if ($request->has('search') && $request->search != '') {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        // Get the filtered list of courses and workshops
        $programs = $query->where('user_id', auth()->id())->get();

        // Return the view with the courses and workshops data
        return view('programs.index', compact('programs'));
    }

    public function create()
    {
        return view('programs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'document' => 'nullable|file|mimes:pdf|max:2048',
            'duration' => 'nullable|string|max:50',
            'organized_by' => 'nullable|string|max:255',
            'type' => 'required|string|in:course,workshop',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'location' => 'nullable|string|max:255',
        ]);

        $documentPath = null;
        if ($request->hasFile('document')) {
            $documentPath = $request->file('document')->store('documents', 'public');
        }

        Program::create([
            'title' => $request->title,
            'description' => $request->description,
            'document_path' => $documentPath,
            'duration' => $request->duration,
            'organized_by' => $request->organized_by,
            'type' => $request->type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'location' => $request->location,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('programs.index');
    }

    public function edit(Program $program)
    {
        return view('programs.edit', compact('program'));
    }

    public function update(Request $request, Program $program)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'document' => 'nullable|file|mimes:pdf|max:2048',
            'duration' => 'nullable|string|max:50',
            'organized_by' => 'nullable|string|max:255',
            'type' => 'required|string|in:course,workshop',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'location' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('document')) {
            if ($program->document_path) {
                Storage::delete('public/' . $program->document_path);
            }

            $documentPath = $request->file('document')->store('documents', 'public');
            $program->document_path = $documentPath;
        }

        $program->update($request->only([
            'title',
            'description',
            'duration',
            'organized_by',
            'type',
            'start_date',
            'end_date',
            'location',
        ]));

        return redirect()->route('programs.index');
    }

    public function destroy(Program $program)
    {
        if ($program->document_path) {
            Storage::delete('public/' . $program->document_path);
        }

        $program->delete();
        return redirect()->route('programs.index');
    }
}
