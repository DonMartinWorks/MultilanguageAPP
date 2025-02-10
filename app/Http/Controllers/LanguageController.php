<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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
        if (in_array($locale, ['en', 'es', 'fr'])) {
            return redirect()->back()->withCookie(cookie('app_locale', $locale, 60 * 24 * 30)); // 30 days of validity
        }

        # Return if the language are different using the previous request list.
        return redirect()->back();
    }
}
