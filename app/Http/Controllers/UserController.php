<?php

namespace App\Http\Controllers;
use App\User;
use Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function signup(Request $request){

            $validator = Validator::make($request->all(),[
                'email' => 'required|email|unique:users',
                'mobile' => 'required|unique:users',
                'category'=> 'required',
                'password'=>'required',
                'securitycode' => 'required',
                'name' => 'required',
                'website' => 'required',
                'country' => 'required',
                'avatar' => 'required'
            ]);

            if($validator->fails()){
                return response()->json(['message'=>$validator->errors()],400);
            }
    
            $user  = new User([
                'email' => $request->input('email'),
                'mobile' => $request->input('mobile'),
                'category' => $request->input('category'),
                'password' => bcrypt($request->input('password')),
                'securitycode' => $request->input('securitycode'),
                'name' => $request->input('name'),
                'website' => $request->input('website'),
                'country' => $request->input('country'),
                'avatar' => $request->input('avatar')
            ]);
    
            $user->save();
            return response()->json(['message'=> "Successfully created"], 201);    
    }
}