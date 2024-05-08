<?php
namespace Duynguyentho\LaravelMacros;

use \Illuminate\Http\Response;
use Illuminate\Support\ServiceProvider;
use \Illuminate\Support\Collection;
class LaravelMacrosServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        /**
         * Register macros Collection
         */
        foreach($this->collectionMacros() as $macro => $class) {
            if (Collection::hasMacro($macro)) {
                continue;
            }

            Collection::macro($macro, app($class)());
        }
        /**
         * Register macros Response
         */

        foreach($this->responseMacros() as $macro => $class) {
            if (Response::hasMacro($macro)) {
                continue;
            }

            Response::macro($macro, app($class)());
        }

    }

    private function collectionMacros(): array
    {
        return [
            'paginate' => \Duynguyentho\LaravelMacros\Collection\Paginate::class,
            'increase' => \Duynguyentho\LaravelMacros\Collection\Increase::class,
            'decrease' => \Duynguyentho\LaravelMacros\Collection\Decrease::class,
            'indexOf' => \Duynguyentho\LaravelMacros\Collection\IndexOf::class,
        ];
    }

    private function responseMacros(): array
    {
        return [
            'notFound' => \Duynguyentho\LaravelMacros\Response\NotFound::class,
            'ok' => \Duynguyentho\LaravelMacros\Response\Ok::class,
        ];
    }
}
