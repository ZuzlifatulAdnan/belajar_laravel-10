<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LocalController extends Controller
{
    public function set_locale($locale)
    {
        session::put('locale', $locale);
        return Redirect::back();
    }
}
