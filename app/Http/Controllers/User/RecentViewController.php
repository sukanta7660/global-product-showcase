<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RecentViewController extends Controller
{
    public function index() :View
    {
        return view('user.recentViewProducts');
    }
}
