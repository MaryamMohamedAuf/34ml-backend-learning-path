<?php
namespace App\Http\Filters\V1;

class StudentFilters extends QueryFilters
{
    public  function name($value)
    {
        return $this->builder->where('name', 'like', "%{$value}%");
    }
public function includes($value)
{
    return $this->builder->with($value);
}
}
