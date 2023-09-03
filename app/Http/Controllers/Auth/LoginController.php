<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\AuthTraits\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
   use AuthenticatesUsers;
}
