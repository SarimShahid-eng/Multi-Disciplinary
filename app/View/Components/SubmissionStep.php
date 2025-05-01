<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SubmissionStep extends Component
{
    public string $route;
    public string $label;
    public $manuscript;

    public function __construct(string $route, string $label, $manuscript)
    {
        $this->route = $route;
        $this->label = $label;
        $this->manuscript = $manuscript;
    }

    public function isActive(): bool
    {
        return request()->routeIs($this->route);
    }

    public function hasManuscript(): bool
    {
        return !is_null($this->manuscript);
    }

    public function render()
    {
        return view('components.submission-step');
    }
}
