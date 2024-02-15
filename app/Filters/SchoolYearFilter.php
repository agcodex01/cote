<?php

namespace App\Filters;


class SchoolYearFilter extends Filter
{
    public function search(mixed $value)
    {
        return $value != null
            ? $this->builder->where('from', 'like', "%$value%")->orWhere('to', 'like', "%$value%")
            : $this->builder;
    }
}
