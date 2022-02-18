<?php

namespace App\Traits\Auth;

use App\Http\Requests\Auth\Password\Confirm;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Http\Request;

trait ConfirmsPasswords
{
    use RedirectsUsers;

    /**
     * Display the password confirmation view.
     *
     * @return \Illuminate\View\View
     */
    public function showConfirmForm()
    {
        return view('auth.passwords.confirm');
    }

    /**
     * Confirm the given user's password.
     *
     * @param  \Illuminate\Http\Request|App\Http\Requests\Auth\Password\Confirm  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function confirm(Confirm $request)
    {
        if ($request->has('to')) {
            $this->redirectTo = $request->to;
        }

        $this->resetPasswordConfirmationTimeout($request);

        return $request->isJson() ? response()->json(['intended' => $this->redirectPath()]) : redirect()->intended($this->redirectPath());
    }

    /**
     * Reset the password confirmation timeout.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function resetPasswordConfirmationTimeout(Request $request)
    {
        $request->session()->put('auth.password_confirmed_at', time());
    }
}
