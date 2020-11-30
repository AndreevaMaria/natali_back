<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Password;

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
        $user = User::where('Email', $request->Email)->first();
        //&& $user->Token == $request->Token
        if ($user &&  password_verify($request->Password, $user->Password)) {
            $user->Token == uniqid();
            $user->save();
            return $user;
        } else {
            return false;
        }
    }

    /**
     * postRegister
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request)
    {
        return User::create([
            'Name' => $request->Name,
            'LastName' => $request->LastName,
            'Email'  => $request->Email,
            'Phone' => $request->Phone,
            'Password' => password_hash($request->Password, PASSWORD_BCRYPT),
            'Token' => uniqid(),
            'Role' => 'user'
        ]);
    }

    /**
     * logout
     *
     * @param  idUser
     * @return \Illuminate\Http\Response
     */
    public function logout($idUser)
    {
        $user = User::find($idUser);
        var_dump($user);
        $user->Token = '';
        $user->save();
        return response()->json('', 200);
    }

    /**
     * updateUser
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  idUser
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Request $request, $idUser)
    {
        $user = User::find($idUser);
        if($user && $user->Token == $request->Token) {
            $user->update($request->input());
            return response()->json($user, 200);
        } return false;
    }

    /**
     * AuthUser
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function AuthUser(Request $request)
    {
        $user = User::where('Token', $request->bearerToken())->get();
        
        return response()->json($user, 200);
    }
}
