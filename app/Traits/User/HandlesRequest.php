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
        $request->user()->update($request->validated());

        return $request->user();
    }
}
