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
        $validated = $request->validated();
        Project::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'slug' => $validated['slug'],
            'deadline' => $validated['deadline'],
            'priority' => $validated['priority'],
            'user_id' => auth()->id()
        ]);
        return response()->json('Project created!');
    }

    public function update(StoreProjectRequest $request, Project $project)
    {
        $this->authorize('update', $project);

        $project->update($request->validated());

        return response()->json('Project updated!');
    }

    public function destroy(Project $project)
    {
        $this->authorize('delete', $project);

        $project->delete();

        return response()->json('Project deleted!');
    }
}
