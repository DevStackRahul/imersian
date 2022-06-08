<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\User;
use Auth;

class FrameHeadersMiddleware
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
        $response = $next($request);
        $user = \Auth::user();
            if($user){
                    $response->header('Content-Security-Policy', "frame-ancestors https://{$user->name} https://admin.shopify.com");
            }
        return $response;
    }
}
