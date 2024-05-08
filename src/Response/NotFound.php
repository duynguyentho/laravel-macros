<?php

namespace Duynguyentho\LaravelMacros\Response;

use Illuminate\Support\Facades\Response;
class NotFound
{
    public function __invoke(): \Closure
    {
        return function ($message = 'Not Found') {
            return Response::make(compact('message'), 404);
        };
    }
}
