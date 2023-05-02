<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;

final class ContactController extends Controller
{
    public function index(): Application|View
    {
        return view('contacts');
    }
}
