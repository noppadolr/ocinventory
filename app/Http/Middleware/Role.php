<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$role): Response
    {
        if ( $request->user()->role !== $role ){
                if($request->user()->role === 'admin'){
                    return redirect('admin/dashboard');
                }elseif($request->user()->role === 'manager'){
                    return redirect('manager/dashboard');
                }elseif ($request->user()->role === 'user') {
                    return redirect('/dashboard');

                }

            }
        return $next($request);
    }
}
