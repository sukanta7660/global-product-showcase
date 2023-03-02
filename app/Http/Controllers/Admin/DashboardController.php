<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /*
     * Add a specific method display the dashboard page
     */

    public function index() :View
    {
        return view('admin.dashboard.dashboard');
    }
}
