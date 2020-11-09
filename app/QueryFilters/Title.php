<?php


namespace App\QueryFilters;


class Title extends Filter
{
    protected function applyFilter($builder)
    {
        return $builder->where('title','like','%'. request($this->getClassName()) .'%');
    }
}
