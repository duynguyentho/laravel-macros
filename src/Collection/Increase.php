<?php
namespace Duynguyentho\LaravelMacros\Collection;

use Illuminate\Support\Collection;
/**
 * Increase each element of collection
 *
 * @param int $number
 * @param int $strictMode
 *
 * @mixin Collection
 *
 * @return Collection
 */

class Increase
{
    public function __invoke(): \Closure
    {
        return function ($number, $strictMode = false) {
            return $this->map(function ($item) use ($number, $strictMode) {

                if ($strictMode && gettype($item) != 'integer') {
                    throw new \Exception("Each value of Collection must be an integer");
                }

                if (!is_numeric($item)) {
                    throw new \Exception("Each value of Collection must be a numberic");
                }

                return $item += $number;
            });
        };
    }
}
