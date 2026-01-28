<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Response;

class checkTimeAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $now = Carbon::now('Asia/Ho_Chi_Minh');

        $start = $now->copy()->setTime(9, 0, 0);
        $end   = $now->copy()->setTime(23, 59, 59);
        if ($now >= $start && $now <= $end) {
            return $next($request);
        }
        else {
            $data = [
                'message' => 'Access denied',
                'current_time' => $now->toDateTimeString(),
            ];
            return response()->json($data, 403);
        }
    }
}
