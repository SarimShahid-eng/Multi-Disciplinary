<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SubmittedManuscriptTab extends Component
{
    public string $route;
    public string $label;

    public function __construct(string $route, string $label)
    {
        $this->route = $route;
        $this->label = $label;
    }

    public function isActive(): bool
    {
        return request()->routeIs($this->route);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.submitted-manuscript-tab');
    }
}
