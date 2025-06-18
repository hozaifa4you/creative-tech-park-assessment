<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PasswordResetController extends Controller
{
   public function __construct() {}

   public function create()
   {
      $controller = new PasswordResetLinkController();

      return $controller->create();
   }

   public function store(Request $request)
   {
      $controller = new PasswordResetLinkController();

      return $controller->store($request);
   }
}
