<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Moderator;
use App\Models\Notification;
use App\Models\User;
use App\Models\Users_social;
use App\Notifications\userNew;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function register(Request $request)
    {
        $country = Country::find($request->country_id);
        $validator = Validator::make($request->all(), [
            'name_ar' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'phone' => "required|alpha_dash|unique:users|digits:$country->number|regex:/^[$country->start_number]/",
            'country_id' => 'required|numeric',
            'password' => 'required|string|confirmed|min:9',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 202);
        }
        $hashedPass = bcrypt($request->password);
        $user = new User();
        $user->email = $request->email;
        $user->name_ar = $request->name_ar;
        $user->country_id = $request->country_id;
        $user->phone = $request->phone;
        $user->password = $hashedPass;
        $user->save();
        $credentials = ['email' => $request->email, 'password' => $request->password];
        if (!$token = Auth::attempt($credentials)) {
            return response()->json(['msg' => 'البيانات المدخلة غير صحيحة!'], 401);
        }
        return $this->respondWithToken($token);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'email_phone' => 'required|string',
            'password' => 'required|string',
        ]);
        try {
            $login_type = filter_var($request->email_phone, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
            $credentials = [$login_type => $request->email_phone, 'password' => $request->password];
            if (!$token = Auth::attempt($credentials)) {
                return response()->json(['msg' => 'البيانات المدخلة غير صحيحة!'], 401);
            }
            return $this->respondWithToken($token);
        } catch (JWTException $e) {
            return response()->json(['msg' => 'البيانات المدخلة غير صحيحة!'], 401);
        }
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(['user' => auth()->user()]);
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
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => Auth::user()
        ]);
    }
}
