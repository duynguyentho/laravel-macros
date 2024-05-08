<?php

namespace Duynguyentho\LaravelMacros\Collection;
use Illuminate\Support\Collection;

/**
 * Increase each element of collection
 *
 * @param mixed $value
 *
 * @mixin Collection
 *
 * @return mixed
 */
class IndexOf
{
    public function __invoke()
    {
        return function ($value) {
            return $this->search($value);
        };
    }
}
