<?php


namespace Binomedev\Portfolio\Http\Controllers;

use App\Http\Controllers\Controller;
use Binomedev\Portfolio\Models\Project;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::query()
            ->with('media', 'category')
            ->orderByDesc('created_at')
            ->paginate();

        return view('portfolio::projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        $gallery = $project->load('category')->getMedia('gallery');

        return view('portfolio::projects.show', compact('project', 'gallery'));
    }
}
