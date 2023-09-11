<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Traits\AuthTraits\AuthenticatesUsers;

class LoginController extends Controller
{
   use AuthenticatesUsers;
}
