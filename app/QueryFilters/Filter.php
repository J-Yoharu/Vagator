<?php

namespace App\QueryFilters;

use Closure;
use Illuminate\Support\Str;

abstract class Filter
{
    public function handle($request, Closure $next)
    {
        $builder = $next($request);

        if(request($this->getClassName()) != null){
            return $this->applyFilter($builder);
        }
        return $builder;
    }

    protected abstract function applyFilter($builder);

    protected function getClassName()
    {
        return Str::snake(class_basename($this));
    }
}
