<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Str;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            $namespace = Str::startsWith(ltrim(preg_replace('/\?.*/', '',
            Str::replaceFirst($request->root(), '', $request->url())), '/'), 'admin') ?
            'admin.auth.login' :
            'login';

            return route($namespace);
        }
    }
}
