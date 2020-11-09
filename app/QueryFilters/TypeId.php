<?php


namespace App\QueryFilters;


class TypeId extends Filter
{
    protected function applyFilter($builder)
    {
        return $builder->where($this->getClassName(), request($this->getClassName()));
    }
}
