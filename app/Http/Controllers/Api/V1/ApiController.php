<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests; // Import the trait

class ApiController extends Controller
{
    //use ApiRespones;
    use AuthorizesRequests; // Add this trait
    protected $policyClass;
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
    public  function isAble($ability, $targetModel){
        if (auth()->user()->cannot($ability, [$targetModel, $this->policyClass])) {
            abort(403, 'Unauthorized action.');
        }
 return $this->authorize($ability, [$targetModel,$this->policyClass]);
 }
}
