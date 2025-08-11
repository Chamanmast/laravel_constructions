<?php

namespace App\View\Components\backend\backend_component;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MenuGroupForm extends Component
{
    public $menugroup;

    public $isEdit;

    /**
     * Create a new component instance.
     */
    public function __construct($menugroup = null, $isEdit = false)
    {
        $this->menugroup = $menugroup;
        $this->isEdit = $isEdit;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.backend.backend_component.menu-group-form');
    }
}
