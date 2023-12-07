<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class HomeController extends Controller
{
    public function index() {
        return view('home.userpage');
    }
    public function redirect()
{
    if (Auth::check()) {
        $user_type = Auth::user()->usertype;

        return $user_type == 1 ? view('admin.home') : view('home.userpage');
    }

    // Redirect to the login page or perform another action for non-authenticated users
    return redirect()->route('login');
}
}
