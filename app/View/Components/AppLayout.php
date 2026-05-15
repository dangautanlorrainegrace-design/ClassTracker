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
        // Only two interfaces are allowed in the app:
        // - Admin: resources/views/layouts/admin/layout.blade.php
        // - User : resources/views/layouts/user/layout.blade.php
        // NOTE: role === 'faculty' is treated as admin in this project.
        if (Auth::check()) {
            return view(Auth::user()->role === 'faculty' ? 'layouts.admin.layout' : 'layouts.user.layout');
        }

        return view('layouts.user.layout');
    }
}
