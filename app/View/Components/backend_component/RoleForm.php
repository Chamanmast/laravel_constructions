<?php

namespace App\View\Components\backend\backend_component;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RoleForm extends Component
{
    public $role;

    public $isEdit;

    /**
     * Create a new component instance.
     */
    public function __construct($role = null, $isEdit = false)
    {
        $this->role = $role;
        $this->isEdit = $isEdit;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.backend.backend_component.role-form');
    }
}
