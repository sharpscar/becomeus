<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use View;

class UsersController extends Controller
{


    public function getLogin(){
      #return View::make('users.login');

      return view('auth.login');
    }
    public function getLogout()
    {
        Auth::logout();
        return Redirect::back()->with('success','로그아웃 되었습니다.');
    }

    public function handleLogin(){

      $rules = [
        'email'=>'required',
        'password'=>'required'
      ];
      $validator = Validator::make(input::all(), $rules);

      if($validator->passes())
      {
        if(Auth::attempt( array('email'=>input::get('email'),'password'=>Input::get('password')  )))
        {
          return Redirect::to('/product')->with('success','로그인 되었습니다.');
        }else{
          Input::flashOnly('username');
          return Redirect::to('/login')->with('error', '이메일 또는 비밀번호가 잘못되었습니다.');
        }

      }


        return Redirect::to('login')->withErrors($validator);
    }
}
