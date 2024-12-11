<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function index()
{
    return UserResource::collection(User::all());

}
    public function show($id)
    {
       $user = User::find($id);

        return new UserResource($user);
    }
}
