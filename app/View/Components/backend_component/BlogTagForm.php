<?php

namespace App\View\Components\backend\backend_component;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BlogTagForm extends Component
{
    public $blogtag;

    public $isEdit;

    /**
     * Create a new component instance.
     */
    public function __construct($blogtag = null, $isEdit = false)
    {
        $this->blogtag = $blogtag;
        $this->isEdit = $isEdit;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.backend.backend_component.blog-tag-form');
    }
}
