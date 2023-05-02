<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;

final class MainController extends Controller
{
    public function index(): Application|View
    {
        return view('main');
    }
}
