<?php

namespace App\View\Components\Layouts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Auth extends Component
{
    /**
     * The title of the page.
     *
     * @var string
     */
    public $title;

    /**
     * Create a new component instance.
     */
    public function __construct($title = null)
    {
        $this->title = $title ? env('APP_NAME', 'Projeto') . ' - ' . $title : env('APP_NAME', 'projeto');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layouts.auth');
    }
}
