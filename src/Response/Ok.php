<?php

namespace Duynguyentho\LaravelMacros\Response;

use Illuminate\Support\Facades\Response;

class Ok
{
    public function __invoke(): \Closure
    {
        return function ($data = null, $message = 'OK') {
            return Response::make([
                'status' => true,
                'message' => $message,
                'data' => $data,
            ], 200);
        };
    }
}
