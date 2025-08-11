<?php

namespace App\View\Components\backend\backend_component;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MenuForm extends Component
{
    public $menu;

    public $menus;

    public $menugroup;

    public $type;

    public $isEdit;

    /**
     * Create a new component instance.
     */
    public function __construct($menu = null, $menus = null, $menugroup = null, $type = null, $isEdit = false)
    {
        $this->menu = $menu;
        $this->menus = $menus;
        $this->menugroup = $menugroup;
        $this->type = $type;
        $this->isEdit = $isEdit;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.backend.backend_component.menu-form');
    }
}
