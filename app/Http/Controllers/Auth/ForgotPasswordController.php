<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\AuthTraits\SendPasswordResetEmails;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class ForgotPasswordController extends Controller
{
    use SendPasswordResetEmails;
}
