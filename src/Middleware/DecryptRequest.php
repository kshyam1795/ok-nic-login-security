<?php

namespace Growats\OkNicLoginSecurity\Middleware;

use Closure;
use Growats\OkNicSecureLogin\EncryptionService;
use Illuminate\Http\Request;

class DecryptRequest
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->has('data')) {
            $decryptedData = EncryptionService::decryptData($request->input('data'));
            $request->merge(json_decode($decryptedData, true));
        }

        return $next($request);
    }
}
