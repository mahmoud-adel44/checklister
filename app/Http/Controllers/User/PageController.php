<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome()
    {
        $page = Page::findOrFail(1); // Welcome page

        return view('user.page', compact('page'));
    }

    public function consultation()
    {
        $page = Page::findOrFail(2); // Get Consultation page

        return view('user.page', compact('page'));
    }
}
