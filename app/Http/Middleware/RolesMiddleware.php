<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RolesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $except = ['reservations', 'rent_items','rent_plans'];
        $name = $request->route()->getName();
        if (in_array(explode('.', $name)[0], $except)) return $next($request);

        $name = str_replace('.form', '', $name);
        $name = str_replace('import', 'create', $name);
        $name = str_replace('index', 'show', $name);
        $name = str_replace('store', 'create', $name);
        $name = str_replace('update', 'edit', $name);
        $name = str_replace('destroy', 'delete', $name);


        $name = str_replace('pending_services_serves.respond', 'requests.create', $name);

        if (auth()->user()->can($name))
            return $next($request);
        else abort(403);
    }
}
