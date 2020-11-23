<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use illuminate\Support\Facades\Auth;
use illuminate\Support\Facades\Hash;

//use Tymon\JWTAuth\Providers\Auth\

class AuthController extends Controller
{
    /**
     * postLogin
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        if ($user  = User::find('Email', $request->Email)) {
            if ($user->Password == password_hash($request->Password, PASSWORD_BCRYPT)) {
                $user->Token == uniqid();
                $user->save();
            }
            return $user;
        } else return;

    }

    /**
     * postRegister
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request)
    {
        $request->validate([
            'Email' => 'required|Email|unique:users',
            'Password' => 'required|min:6',
            'Name' => 'required|',
            'LastName' => 'required',
            'Phone' => 'required',
            'ConfirmPass' => 'required'
        ]);
        $data = $request->all();
        return User::create([
            'Name' => $data['Name'],
            'LastName' => $data['LastName'],
            'Email'  => $data['Email'],
            'Phone' => $data['Phone'],
            'Password' => Hash::make($data['Password']),
            'Token' => uniqid(),
            'Role' => 'user'
        ]);
    }

    /**
     * logout
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        return Auth::logout();
    }

    /**
     * updateUser
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  token  $Token
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Request $request, $Token)
    {
        return response()->json(User::find('Token', $Token)->update($request->input()), 200);
    }
}
