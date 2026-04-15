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
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response\n    {\n        if (!auth()->check() || !auth()->user()->isAdmin()) {\n            return redirect()->route('admin.login');\n        }\n        return $next($request);\n    }
}
