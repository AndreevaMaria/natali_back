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
        $request->validate([
            'Email' => 'required',
            'Pass' => 'required'
        ]);
        $credentials = $request->only('Email', 'Pass');
        if(Auth::attempt($credentials)) {
            return Auth::user();
        }
        return redirect('/');
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
            'Pass' => 'required|min:6',
            'Name' => 'required|',
            'LastName' => 'required',
            'Phone' => 'required',
            'ConfirmPass' => 'required'
        ]);
        $this->create($request->all());
        return redirect('/');
    }

    /**
     * createUser
     *
     * @param $data
     * @return \Illuminate\Http\Response
     */
    public function createUser($data)
    {
        return User::create([
            'Name' => $data['Name'],
            'LastName' => $data['LastName'],
            'Email'  => $data['Email'],
            'Phone' => $data['Phone'],
            'Password' => Hash::make($data['Password']),
            'Token'  => uniqid()
        ]);
    }

    /**
     * logout
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/');
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
