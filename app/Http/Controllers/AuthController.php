<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *s
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);
        if (!isset($credentials['email']) || !isset($credentials['password'])) {
            return response()->json(['error' => 'Invalid credentials'], 400);
        }
        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->respondWithToken($token);
    }
    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ]);
        if($validator -> fails()){
            return response()->json(['error' => $validator -> errors()->all()], 409);
        }
        $user = new User();
        $user->email = $request->email;
        $name = explode('@', $user->email)[0];
        $user->name = $name;
        $user->password = $request->password;
        $user->phone = $request->phone;
        $user->save();
        return response()->json(['message'=>'Đăng ký thành công!']);
    }
    public function checkEmail(Request $request){
        $user = User::where('email', $request->email)->first();
        if($user) return response()->json(['message'=>'fail']);
        return response()->json(['message'=>'ok']);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh);
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::manager()->getPayloadFactory()->getTTL() * 60,
            'user'=>auth()->user()
        ]);
    }
}