<?php

namespace Modules\Dashboard\Http\Controllers;

use Elnooronline\LaravelLocales\Facades\Locales;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{
    /**
     * Change the dashboard language.
     *
     * @param string $locale
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($locale)
    {
        Session::put('locale', $locale);
//        dd(Locales::getDir());

        return back();
    }
}
