<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AdminLoginRequest;

class AuthController extends Controller
{
   public function create()
   {
      return view('admin.login');
   }

   public function store(AdminLoginRequest $request)
   {
      $request->authenticate();

      $session = $request->session()->regenerate();

      return redirect()->intended(route('dashboard', absolute: false));
   }
}
