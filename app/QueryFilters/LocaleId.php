<?php


namespace App\QueryFilters;


class LocaleId extends Filter
{
    protected function applyFilter($builder)
    {
        return $builder->where($this->getClassName(), request($this->getClassName()));
    }
}
