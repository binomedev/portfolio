<?php


namespace Binomedev\Portfolio\Http\View\Components;


use Illuminate\View\Component;

class ProjectCard extends Component
{

    public $project;

    /**
     * ProjectCard constructor.
     * @param $project
     */
    public function __construct($project)
    {
        $this->project = $project;
    }


    public function render()
    {
        return view('portfolio::components.project-card');
    }
}
