<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Logger
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        logger()->info("Request path: {$request->path()}");
        logger()->info("Request method: {$request->method()}");
        logger()->info("Request data: " . json_encode($request->all()));
        logger()->info("Request params: ". json_encode($request->route()->parameters));

        return $next($request);
    }
}
