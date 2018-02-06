<?php namespace Bantenprov\RasioGMSMK\Http\Middleware;

use Closure;

/**
 * The RasioGMSMKMiddleware class.
 *
 * @package Bantenprov\RasioGMSMK
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class RasioGMSMKMiddleware
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
        return $next($request);
    }
}
