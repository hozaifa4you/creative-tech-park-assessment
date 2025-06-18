<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Auth\NewPasswordController as AuthNewPasswordController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewPasswordController extends Controller
{
   public function create(Request $request)
   {
      $controller = new AuthNewPasswordController();
      return $controller->create($request);
   }

   public function store(Request $request)
   {
      $controller = new AuthNewPasswordController();
      return $controller->store($request);
   }
}
