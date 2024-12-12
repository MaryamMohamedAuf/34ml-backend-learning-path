<?php
namespace App\Http\Filters\V1;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
abstract class QueryFilters
{
    protected $builder;
    protected $request;
    function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function filter($arr){
        foreach ($arr as $key => $value) {
            if(method_exists($this, $key)) {
                $this->$key($value);
            }
        }
    }
    public function apply(Builder $builder)
    {
        $this->builder = $builder;
        foreach ($this->request->all() as $key => $value) {
            if(method_exists($this, $key)) {
                $this->$key($value);
            }
        }
        return $builder;
    }
}
