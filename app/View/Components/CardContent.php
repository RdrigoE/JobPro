<?php

namespace App\View\Components;

use App\Models\JobListing;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardContent extends Component
{
    /**
     * Create a new component instance.
     */
    public JobListing $job;
    public function __construct(JobListing $job)
    {
        $this->job = $job;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-content');
    }
}
