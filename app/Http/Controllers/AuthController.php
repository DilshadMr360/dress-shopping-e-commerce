<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginIndex() {

        return view('auth.login');
    }

    public function registerIndex() {
        return view('auth.register');
    }
}
