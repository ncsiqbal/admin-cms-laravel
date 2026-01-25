<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Page;

class FrontendNavbar extends Component
{
    public $pages;

    public function __construct()
    {
        $this->pages = Page::where('is_active', true)->get();
    }

    public function render()
    {
        return view('components.frontend-navbar');
    }
}
