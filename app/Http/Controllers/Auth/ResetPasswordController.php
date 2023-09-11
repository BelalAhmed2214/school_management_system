<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Traits\AuthTraits\ResetPasswords;

class ResetPasswordController extends Controller
{
    use ResetPasswords;
}
