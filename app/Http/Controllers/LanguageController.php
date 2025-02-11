<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;

class LanguageController extends Controller
{
    /**
     * Changes the application language using cookies.
     * The default language is English.
     *
     * @param  \Illuminate\Http\Request  $request The HTTP request object.
     * @param  string  $locale The language code (e.g., 'en', 'es', 'fr'). Defaults to 'en'.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function switch(Request $request, string $locale = 'en'): RedirectResponse
    {
        $allowedLocales = ['en', 'es', 'fr']; // Store allowed locales for efficiency

        if (in_array($locale, $allowedLocales)) {
            return Redirect::back()->withCookie(Cookie::make('app_locale', $locale, 60 * 24 * 30)); // Use Cookie::make() directly
        }

        return Redirect::back(); // No need for the comment, the code is clear enough
    }
}
