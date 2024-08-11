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
     * @var string|null
     */
    public $title;

    /**
     * Create a new component instance.
     */
    public function __construct($title = null)
    {
        // Se um título for fornecido, use-o; caso contrário, use o nome da aplicação.
        $this->title = $title ? config('app.name', 'Projeto') . ' - ' . $title : config('app.name', 'Projeto');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layouts.auth', [
            'title' => $this->title,
        ]);
    }
}
