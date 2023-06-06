<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;


class ProjectController extends Controller
{
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect('/projects')->with('message', 'Project deleted successfully!');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'description' => ['required', 'min:3'],
            'is_archived' => [],
            'status' => ['required', 'min:3'],
        ]);
        $formFields['is_archived'] = false;
        Project::create($formFields);
        return redirect('/projects')->with('message', 'Project created successfully!');
    }

    public function archive(Project $project)
    {
        $project->is_archived = true;
        $project->save();
        return redirect('/projects')->with('message', 'Project archived successfully!');
    }

    public function unarchive(Project $project)
    {
        $project->is_archived = false;
        $project->save();
        return redirect('/projects')->with('message', 'Project unarchived successfully!');
    }

    public function edit(Project $project)
    {
        return view('projects.edit')->with('project', $project);
    }
}
