<?php

namespace App\Traits\User;

use Illuminate\Http\Request;

trait HandlesRequest
{
    /**
     * Display the specified user.
     *
     * @return \Illuminate\Http\Response
     */
    protected function get(Request $request)
    {
        return $request->user();
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    protected function update(Request $request)
    {
        $updated = $request->user()->update($request->validated());

        return response()->json($updated ? $request->user() : [
            'message' => 'An error occured.',
        ], ($updated) ? 200 : 500);
    }
}
