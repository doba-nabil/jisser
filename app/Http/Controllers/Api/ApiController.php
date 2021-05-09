<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function checkEmail(Request $request)
    {
        $checkEmail = User::where('email', $request->email)->first();
        if ($checkEmail) return response()->json(['status' => 1], 200); else return response()->json(['status' => 0], 200);
    }

    public function checkPhone(Request $request)
    {
        $checkPhone = User::where('phone', $request->phone)->first();
        if ($checkPhone) return response()->json(['status' => 1], 200); else return response()->json(['status' => 0], 200);
    }

    public function checkEmailPhone(Request $request)
    {
        $checkEmailPhone = User::where('email', $request->email_phone)->orWhere('phone', $request->email_phone)->first();
        if ($checkEmailPhone) return response()->json(['status' => 1], 200); else return response()->json(['status' => 0], 200);
    }

    public function countries()
    {
        $countries = Country::with('cities')->get();
        return response()->json(['countries' => $countries], 200);
    }
}
