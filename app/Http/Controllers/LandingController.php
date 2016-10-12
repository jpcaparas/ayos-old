<?php

namespace App\Http\Controllers;

class LandingController extends Controller
{
    public function comingSoon() {
        return view('landing.coming_soon');
    }
}
