<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Resources\V1\ProjectCollection;
use App\Http\Resources\V1\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return new ProjectCollection(Project::all());
    }

    public function show(Project $project)
    {
        return new ProjectResource($project);
    }

    public function store(StoreProjectRequest $request)
    {
        Project::create($request->validated());
        return response()->json('Project created!');
    }

    public function update(StoreProjectRequest $request, Project $project)
    {
        $project->update($request->validated());
        return response()->json('Project updated!');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return response()->json('Project deleted successfully!');
    }
}
