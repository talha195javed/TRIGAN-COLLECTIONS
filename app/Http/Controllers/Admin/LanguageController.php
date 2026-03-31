<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function changeLanguage(Request $request)
    {
        $lang = $request->input('lang');

        if ($lang !== 'en') {
            session()->forget('locale');
            app()->setLocale('en');

            return redirect()->back()->with('success', 'Language changed successfully');
        }

        session()->forget('locale');
        app()->setLocale('en');

        return redirect()->back()->with('success', 'Language changed successfully');
    }
}
