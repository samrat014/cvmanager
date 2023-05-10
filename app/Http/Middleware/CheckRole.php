<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // check if the user is amdin or not
        // if not don't give the permission perform the task

       if(auth()->user()->role == 'admin' && auth()->check()){
        return $next($request);
       }else{
           return redirect('admin/dashboard');
       }

    }
}
