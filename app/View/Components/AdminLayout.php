<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AdminLayout extends Component
{
    public $breadcrumb;
    public $wysiwyg;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($breadcrumb = [], $wysiwyg = false)
    {
        $this->breadcrumb = $breadcrumb;
        $this->wysiwyg = $wysiwyg;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.admin');
    }
}
