<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;

class ContactController extends Controller
{
    public function index(): Application|View
    {
        return view('contacts');
    }
}
