<?php

namespace App\View\Components;

use App\Models\BusinessInformation;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class clientFooter extends Component
{
    /**
     * Create a new component instance.
     */
    public $businessInformation;

    public function __construct()
    {
        $this->businessInformation = BusinessInformation::all()->first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('client.components.client-footer', [
            'businessInformation' => $this->businessInformation,
        ]);
    }
}
