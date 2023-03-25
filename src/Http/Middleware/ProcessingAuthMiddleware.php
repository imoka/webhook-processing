<?php

namespace Moka\ProcessingSync\Http\Middleware;

use Closure;

class ProcessingAuthMiddleware
{
    const AUTH_TOKEN_HEADER = 'Auth-Token';

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = $request->header(self::AUTH_TOKEN_HEADER);

        if ($token == null) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ]);
        }

        if ($token != config('processing.auth-token-header')) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ]);
        }

        return $next($request);
    }
}
