<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Member;

class UserController extends Controller
{
    //Register member in gym systema
    public function registerMember(StoreMemberRequest $request){
        $validated = $request->validated();
        $member = Member::create($validated);
        return response(['message'=>'Member Registered', 'data'=>$member], 201);
    }

    //Register user in gym
    public function registerUser(StoreUserRequest $request){
        $validated = $request->validated();
        $user = User::create($validated);
        return response(['message' => 'User Registered', 'data' => $user], 201);
    }

    public function registerAdmin(StoreUserRequest $request){
        //to apply token and admin validation!!!
        $validated = $request->validated();
        $validated['type'] = 'admin';
        $user = User::create($validated);
        return response(['message' => 'Admin Registered', 'data' => $user], 201);
    }

    public function getAll(){
        //to apply token and admin validation!!!
        $users = User::with('member')->get();
        return response(['data' => $users], 200);
    }

    public function updateUser(UpdateUserRequest $request, $id){
        //To apply token
        $user = User::findOrFail($id);
        $validated = $request->validated();
        $user->update($validated);
        return response(['data'=>$user, 'message'=> 'User Updated'], 200);
    }
}
