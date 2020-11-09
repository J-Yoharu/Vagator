<?php


namespace App\QueryFilters;

use Closure;

class DepartmentId extends Filter
{
    protected function applyFilter($builder)
    {
        return $builder->where($this->getClassName(), request($this->getClassName()));
    }
}
