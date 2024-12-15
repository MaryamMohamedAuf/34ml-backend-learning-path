<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ApiController extends Controller
{
    public  function includes( string $relationship):bool
    {
        $param = request()->get('includes');
        Log::info('Includes parameter:', ['includes' => $param]); // Log the parameter value

        if(!isset($param)){
            return false;
        }
        $values = explode(',',strtolower($param));
        return in_array(strtolower($relationship), $values);
    }
//    public  function isAble($ability, $targetModel){
//    return $this->authorize($ability, [$targetModel,$this->policyClass]);
//    }
}
