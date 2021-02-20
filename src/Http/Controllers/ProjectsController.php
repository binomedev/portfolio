<?php


namespace Binomedev\Portfolio\Http\Controllers;

use App\Http\Controllers\Controller;
use Binomedev\Portfolio\Models\Project;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::query()->orderByDesc('created_at')->paginate();

        return view('portfolio::projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        return view('portfolio::projects.show', compact('project'));
    }
}
