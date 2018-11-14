<?php

namespace App\Http\Middleware;

use Closure;

class CheckRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $myIps = ['10.0.3.59'];
        info([$request->manager1,$request->manager2]);
        info($request->header('ip'));

        $requestIp = $request->header('ip');

        if(in_array($requestIp, $myIps))
        {

            return $next($request);

        }

        return response()->json(['status' => 401]);
        
    }
}
