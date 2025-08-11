<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberRequest;
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
}
