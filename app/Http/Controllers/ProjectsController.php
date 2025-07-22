<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProject;
use App\Http\Requests\UpdateProject;
use App\Models\Projects;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function createProject(CreateProject $request)
    {
        $data = $request->validated();
        Projects::create($data);
        return response()->json(['success' => true, 'message' => 'Project Created.']);
    }

    public function show()
    {
        $projects = Projects::all();

        return view('frontend.pages.showProjects', compact('projects'));
    }

    public function showProjectDetails($id)
    {
        $project = Projects::find($id);
        return view('frontend.pages.projectDetails', compact('project'));
    }

    public function showCreateProjectForm()
    {
        return view('frontend.pages.createProjects');
    }

    public function edit($id)
    {
        $projects = Projects::find($id);
        return view('frontend.pages.updateProject', compact('projects'));
    }

    public function update(UpdateProject $request, $id)
    {
        $projects = Projects::find($id);
        $data = $request->validated();
        $projects->update($data);

        return response()->json(['success' => true, 'message' => 'Project Updated.']);
    }

    public function delete($id)
    {
        $projects = Projects::find($id);

        if ($projects) {
            $projects->delete();
            return response()->json(['success' => true, 'message' => 'Task deleted.']);
        } else {
            return response()->json(['success' => false, 'message' => 'Task not found.'], 404);

        }
    }

    public function search()
    {
        $projects = Projects::where('name', 'LIKE', '%' . request()->name . '%')->get();
        return view('frontend.pages.showUsers', compact('projects'));
    }
}


