<?php

namespace App\View\Components\JobListing;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    /**
     * Create a new component instance.
     */

    public $title;
    public $description;
    public $location;
    public $company;
    public function __construct($title, $description, $company, $location)
    {
        $this->title = $title;
        $this->description = $description;
        $this->location = $location;
        $this->company = $company;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.job-listing.card');
    }
}
