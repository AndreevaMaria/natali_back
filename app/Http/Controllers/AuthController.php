<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Response;
use App\User;
use illuminate\Support\Facades\Auth;
use illuminate\Support\Facades\Hash;
use Session;

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
            return redirect()->intended('/');
        }
        return route('login');
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
            'Email' => 'required',
            'Pass' => 'required'
        ]);
        $credentials = $request->only('Email', 'Pass');
        if(Auth::attempt($credentials)) {
            User::search('Email', 'like', $request->)
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
