<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'user_email' => 'required',
            'user_password' => 'required'
        ]);
        if($validator->fails()){
            return response()->json(['error'=>$validator->errors()->all()],409);
        }
        $user = User::where('user_email',$request->user_email)->get()->first();
        if(!$user){
            return response()->json(['message'=>'fail']);
        }
        $password = decrypt($user->user_password);
        if($password!=$request->user_password){
            return response()->json(['message'=>'fail']);
        }
        return response()->json(['user'=>$user,'message'=>'ok']);
    }
    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'user_email' => 'required|email|unique:users,user_email',
            'user_password' => 'required'
        ]);
        if($validator -> fails()){
            return response()->json(['error' => $validator -> errors()->all()], 409);
        }
        $user = new User();
        $user->user_email = $request->user_email;
        $user_name = explode('@', $user->user_email)[0];
        $user->user_name = $user_name;
        $user->user_password = encrypt($request->user_password);
        $user->user_phone = $request->user_phone;
        $user->save();
        return response()->json(['message'=>'Đăng ký thành công!']);
    }
    public function checkEmail(Request $request){
        $user = User::where('user_email', $request->user_email)->first();
        if($user) return response()->json(['message'=>'fail']);
        return response()->json(['message'=>'ok']);
    }
}
