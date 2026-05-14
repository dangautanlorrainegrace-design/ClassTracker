<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        $layout = 'layouts.app';
        
        if (Auth::check()) {
            $layout = Auth::user()->role === 'faculty' ? 'layouts.admin.layout' : 'layouts.user.layout';
        }
        
        return view($layout);
    }
}
