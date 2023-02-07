<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function createApiToken(Request $request) {
        $token = $request->user()->createToken('access');
     
        Session::flash('message', 'Your API token is: '.$token->plainTextToken);

        return redirect('dashboard');

    }
}
