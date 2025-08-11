<?php

namespace App\View\Components\backend\backend_component;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SkillForm extends Component
{
    public $skill;

    public $isEdit;

    /**
     * Create a new component instance.
     */
    public function __construct($skill = null, $isEdit = false)
    {
        $this->skill = $skill;
        $this->isEdit = $isEdit;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.backend.backend_component.skill-form');
    }
}
