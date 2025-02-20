<?php

namespace Growats\OkNicLoginSecurity\Middleware;

use Closure;
use Growats\OkNicSecureLogin\EncryptionService;
use Illuminate\Http\Request;

class EncryptRequest
{
    public function handle(Request $request, Closure $next)
    {
        // Encrypt form data if POST method and contains form data
        if ($request->isMethod('post') && $request->has('data')) {
            $data = $request->all();
            $encryptedData = EncryptionService::encryptData(json_encode($data));
            $request->merge(['data' => $encryptedData]);
        }

        return $next($request);
    }
}
