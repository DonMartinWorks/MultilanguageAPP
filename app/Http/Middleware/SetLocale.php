<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Config;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $defaultLocale = Config::get('app.locale'); // Cache the default locale

        $locale = $request->cookie('app_locale');

        if ($locale === null) {  //check if the cookie is not set
            $locale = $defaultLocale;
        } elseif ($locale !== $defaultLocale) { // Only set if different from default
            App::setLocale($locale);
        } // else, locale is the default, no need to set it again.

        return $next($request);
    }
}
