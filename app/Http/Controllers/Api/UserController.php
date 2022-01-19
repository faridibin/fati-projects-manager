<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Password;
use App\Http\Requests\User\Request as UserRequest;
use App\Traits\User\HandlesRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use HandlesRequest;

    /**
     * Handle the incoming request.
     *
     * @param  \App\Http\Requests\User\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UserRequest $request)
    {
        if ($request->isMethod('PATCH')) {
            return $this->update($request);
        }

        return $this->get($request);
    }

    /**
     * Store a newly created password in storage.
     *
     * @param  \App\Http\Requests\User\Password  $request
     * @return \Illuminate\Http\Response
     */
    public function password(Password $request)
    {
        $request->user()->update([
            'password' => Hash::make($request->password)
        ]);

        return response()->json(['message' => trans('passwords.updated')]);
    }
}
