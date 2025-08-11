<?php

namespace App\View\Components\backend\backend_component;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BlogForm extends Component
{
    public $blogCategories;

    public $postTags;

    public $blog;

    public $isEdit;

    /**
     * Create a new component instance.
     */
    public function __construct($blogCategories, $postTags, $blog = null, $isEdit = false)
    {
        $this->blogCategories = $blogCategories;
        $this->postTags = $postTags;
        $this->blog = $blog;
        $this->isEdit = $isEdit;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.backend.backend_component.blog-form');
    }
}
