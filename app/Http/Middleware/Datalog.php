<?php

namespace App\Http\Middleware;

use App\Models\Datalog as ModelsDatalog;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Datalog
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $routeList = [
            route('login') => 'Login',
        ];

        if (!$request->isMethod('GET')) {
            $dl = new ModelsDatalog();
            $dl->feature = $request->method() .": ". $routeList[$request->route()];
            $dl->payload = json_encode($request->all());
            $dl->user_id = $request->user()?->id ?? "API";
            $dl->save();
        }
        return $next($request);
    }
}
