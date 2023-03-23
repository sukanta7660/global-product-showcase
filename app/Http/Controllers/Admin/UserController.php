<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Helper;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class UserController extends Controller
{
    /*
     * Fetch all the users
     */
    public function index() :View
    {
        $users = User::latest()->paginate(10);
        return view('admin.user.user', compact('users'));
    }

    /*
     * Fetch all the Admins
     */

    public function admins() :View
    {
        $adminUsers = User::latest()->paginate(10);
        return view('admin.user.admin', compact('adminUsers'));
    }


    /*
     * Destroy a single user
     */

    public function destroy(User $user) :RedirectResponse
    {
        $user->favourites()->delete();
        $user->delete();
        return Helper::sendResponse(200,
            'success',
            'Success',
            'User Successfully Deleted');
    }
}
