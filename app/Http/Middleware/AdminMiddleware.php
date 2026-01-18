<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
{
    // ១. ឆែកថាមាន Login ឬអត់ និងឆែកថាជា Admin ឬអត់
    if (auth()->check() && auth()->user()->role == 'admin') {
        return $next($request);
    }
    // ២. បើមិនមែនជា Admin ទេ ឱ្យរុញទៅកាន់ទំព័រដើម ជាមួយសារ Error
    return redirect('public.home')->with('error', 'អ្នកមិនមានសិទ្ធិចូលទៅកាន់ទំព័រនេះទេ!');
}
}
