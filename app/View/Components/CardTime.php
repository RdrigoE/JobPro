<?php

namespace App\View\Components;

use Closure;
use DateTime;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Date;
use Illuminate\View\Component;

class CardTime extends Component
{
    /**
     * Create a new component instance.
     */
    public DateTime $updated_at;
    public function __construct(DateTime $updated_at)
    {
        $this->updated_at = $updated_at;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-time');
    }
}
