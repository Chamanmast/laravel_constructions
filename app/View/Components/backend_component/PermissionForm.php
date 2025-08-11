<?php

namespace App\View\Components\backend\backend_component;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PermissionForm extends Component
{
    public $permission;

    public $isEdit;

    /**
     * Create a new component instance.
     */
    public function __construct($permission = null, $isEdit = false)
    {
        $this->permission = $permission;
        $this->isEdit = $isEdit;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.backend.backend_component.permission-form');
    }
}
