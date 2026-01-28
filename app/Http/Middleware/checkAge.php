<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if ($request->routeIs('auth.login')) {
        //     return $next($request);
        // }

        $age = session('age');

        if (!is_numeric($age) || $age < 18) {
            return redirect()->route('age')
                ->with('error', 'Bạn cần đăng nhập và phải trên 18 tuổi để xem sản phẩm');
        }

        return $next($request);
    }
}
