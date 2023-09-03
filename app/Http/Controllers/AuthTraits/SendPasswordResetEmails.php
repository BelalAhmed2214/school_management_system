<?php

namespace App\Http\Controllers\AuthTraits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

trait SendPasswordResetEmails
{
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }
    private function inputs(Request $request)
    {
        return $request->only('email');
    }
    private function validateEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
    }
    private function broker()
    {
        return Password::broker();
    }

    private function sendResetLinkResponse(Request $request, $response)
    {
        return $request->wantsJson()
            ? new JsonResponse(['message' => trans($response)], 200)
            : back()->with('status', trans($response));
    }

    private function sendResetLinkFailedResponse(Request $request, $response)
    {
        if ($request->wantsJson()) {
            throw ValidationException::withMessages([
                'email' => [trans($response)],
            ]);
        }

        return back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => trans($response)]);
    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);
        $response = $this->broker()->sendResetLink($this->inputs($request));

        return $response == Password::RESET_LINK_SENT
            ? $this->sendResetLinkResponse($request,$response)
            : $this->sendResetLinkFailedResponse($request, $response);
    }
}
