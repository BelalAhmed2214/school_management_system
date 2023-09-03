<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\AuthTraits\ResetPasswords;
use App\Http\Controllers\Controller;

class ResetPasswordController extends Controller
{
    use ResetPasswords;
}
