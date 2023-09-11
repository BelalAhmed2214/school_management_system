<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Traits\AuthTraits\SendPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    use SendPasswordResetEmails;
}
