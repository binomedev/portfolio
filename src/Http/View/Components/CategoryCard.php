<?php


namespace Binomedev\Portfolio\Http\View\Components;

use Illuminate\View\Component;

class CategoryCard extends Component
{
    public $category;

    /**
     * CategoryCard constructor.
     * @param $category
     */
    public function __construct($category)
    {
        $this->category = $category;
    }

    public function render()
    {
        return view('portfolio::components.category-card');
    }
}
