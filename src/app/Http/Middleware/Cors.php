<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Log;

class Cors {
    public function handle($request, Closure $next) {
        Log::info("Using cors for " . $request->url());
        return $next($request);
                // ->header('Access-Control-Allow-Origin', '*')
                // ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
                // ->header('Access-Control-Allow-Headers', 'Origin, Content-Type, Accept, Authorization, X-Request-With');// <-- Adding this
    }
}