<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Role;

class AuthVoyager
{
    public function handle(Request $request, Closure $next, string $role)
    {
        if(!auth()->user()){
            return response()->view('login');
        }else{
            $dbrole = Role::find(auth()->user()->role_id)->name;
            if($dbrole != $role && $dbrole != 'admin'){
                abort(403);
            }
        }
        return $next($request);
    }
}
