<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
        public function getUser(Request $request)
        {
            return response()->json($request->user());
        }


}
