<?php

namespace App\Http\Middleware;

use Closure;

class StringAmountToInteger
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $input = $request->all();

        if ($input['amount']) {
            $input['amount'] = (int) ($input['amount'] * 100);

            $request->replace($input);
        }

        return $next($request);
    }
}
