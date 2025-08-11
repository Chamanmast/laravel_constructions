<?php

namespace App\View\Components\backend\backend_component;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SideMenuItem extends Component
{
    public $route;

    public $icon;

    public $label;

    public $submenu;

    public $activeRoutes;

    public $permissions;

    /**
     * Create a new component instance.
     */
    public function __construct($route, $icon, $label, $submenu = [], $activeRoutes = [], $permissions = [])
    {
        $this->route = $route;
        $this->icon = $icon;
        $this->label = $label;
        $this->submenu = $submenu;
        $this->activeRoutes = $activeRoutes;
        $this->permissions = $permissions;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.backend.backend_component.side-menu-item');
    }
}
