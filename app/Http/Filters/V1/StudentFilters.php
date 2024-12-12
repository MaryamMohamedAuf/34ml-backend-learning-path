<?php
namespace App\Http\Filters\V1;

class StudentFilters extends QueryFilters
{
    public  function name($value)
    {
        return $this->builder->whereIn('name', explode(',', $value ));
        //'like', "%{$value}%"
    }
    public  function user_id($value)
    {
        return $this->builder->whereIn('user_id', explode(',', $value ));
    }
public function includes($value)
{
    return $this->builder->with($value);
}
}
