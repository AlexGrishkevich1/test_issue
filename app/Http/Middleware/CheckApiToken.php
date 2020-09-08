<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Support\Facades\DB;

class CheckApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $data = $request->all();
        $keysIsset = DB::table('users')->pluck('api_key')->toArray();

        $domains = config('app.ALLOWED_DOMAINS');

        $requestHost = parse_url($request->headers->get('origin'),  PHP_URL_HOST);

        if(!in_array($requestHost, $domains)) {
            $requestInfo = [
                'host' => $requestHost,
                'ip' => $request->getClientIp(),
                'url' => $request->getRequestUri()
            ];

            if (empty($data['api_key'])) {
                info([
                    'message' => 'Api key not found',
                    'info' => $requestInfo
                ]);
                throw new \Exception('Api key not found');
            } elseif (!in_array($data['api_key'], $keysIsset)) {
                info([
                    'message' => 'Access denied',
                    'info' => $requestInfo
                ]);
                throw new \Exception('Access denied');
}
        }

        return $next($request);
    }
}
