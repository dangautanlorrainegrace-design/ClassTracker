<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class SetLayoutByRole
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()) {
            $layout = $request->user()->role === 'faculty' ? 'layouts.admin' : 'layouts.user';
            View::share('layout', $layout);
        }

        return $next($request);
    }
}
