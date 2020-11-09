<?php


namespace App\QueryFilters;

use Closure;

class IsRemote
{
    public function handle($request, Closure $next){
        $builder = $next($request);

        if(request()->department != null){
            return $builder->where('is_remote', request()->remote);
        }

        return $builder;
    }

}
