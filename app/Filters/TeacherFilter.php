<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class TeacherFilter extends Filter
{
    public function search($value)
    {
        return $value != null
            ? $this->builder->whereHas('user', function (Builder $query) use ($value) {
                $query->where('fname',  'like', "%$value%")
                    ->orWhere('lname',  'like', "%$value%")
                    ->orWhere('mname',  'like', "%$value%");
            })
            : $this->builder;
    }
}
