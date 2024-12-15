<?php
namespace App\Permissions\V1;
use App\Models\User;

final class Abilities{
    public const ShowStudent = 'student:show';
    public const ShowAllStudent = 'student:index';
    public static function getAbilities(User $user)
{
    if ($user->currentAccessToken() && $user->currentAccessToken()->abilities) {
        return $user->currentAccessToken()->abilities;
    }
    // Fallback logic if no token-specific abilities are found
    return $user->is_manager ? ['student:show'] : ['student:index'];
//    if($user->is_manager){
//        return self::ShowStudent;
//    }else{
//        return self::ShowAllStudent;
//    }
}
}
