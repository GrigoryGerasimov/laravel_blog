<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;

final class AboutController extends Controller
{
    public function index(): Application|View
    {
        return view('about');
    }
}
