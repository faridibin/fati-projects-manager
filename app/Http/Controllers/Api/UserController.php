<?php

namespace App\Http\Controllers\Api;

use App\Events\Password\PasswordChanged;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Avatar;
use App\Http\Requests\User\Password;
use App\Http\Requests\User\Request as UserRequest;
use App\Http\Requests\User\Settings;
use App\Traits\User\HandlesRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
        if ($request->isMethod('PATCH') || $request->isMethod('PUT')) {
            return $this->update($request);
        }

        return $this->get($request);
    }

    /**
     * Store a newly created avatar in storage.
     *
     * @param  \App\Http\Requests\User\Avatar  $request
     * @return \Illuminate\Http\Response
     */
    public function profile_picture(Avatar $request)
    {
        $user = $request->user();

        $name = "{$user->email}.{$request->file->extension()}";

        $destination = \config('filesystems.folders.avatars');

        $path = $request->file('file')->storeAs($destination, $name, \config('filesystems.default'));

        if ($path) {
            $file = $user->profile_picture()->updateOrCreate(['name' => $user->email, 'object_id' => $user->id, 'type' => 'profile_picture'], [
                'path' => $path,
                'url' => Storage::disk(\config('filesystems.default'))->url($path),
                'size' => $request->file->getSize(),
                'mime_type' => $request->file->getmimeType(),
                'uploaded_by' => $user->id,
            ]);

            $user->update(['profile_picture' => $file->id]);

            return response()->json(['message' => "Avatar changed successfully.", 'file' => $file], 200);
        }

        return response()->json(['message' => 'An error occured.'], 500);
    }

    /**
     * Store a newly created password in storage.
     *
     * @param  \App\Http\Requests\User\Password  $request
     * @return \Illuminate\Http\Response
     */
    public function password(Password $request)
    {
        $user = $request->user();

        $changed = $user->update([
            'password' => Hash::make($request->password)
        ]);

        if ($request->session()->has('password_hash_web')) {
            session()->put(['password_hash_web' => $user->getAuthPassword()]);
        }

        \event(new PasswordChanged($user));

        return response()->json([
            'message' => ($changed) ? trans('passwords.updated') : 'An error occured.',
        ], ($changed) ? 200 : 500);
    }

    /**
     * Update a user settings in storage.
     *
     * @param  \App\Http\Requests\User\Settings  $request
     * @return \Illuminate\Http\Response
     */
    public function settings(Settings $request)
    {
        $user = $request->user();

        $updated = $user->settings()->update($request->validated());

        return response()->json(($updated) ? $user->settings()->first() : [
            'message' => 'An error occured.',
        ], ($updated) ? 200 : 500);
    }
}
