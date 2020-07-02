<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Session;
use Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('Register');
    }

    public function register(Request $request)
    {
        $this->validate($request,
            [
                'full_name'=>'required',
                'email' =>'required|email|unique:users,email',
                'address'=>'required',
                'phone'=>'required',
                'password' => 'required|min:6',
                're_password'=>'required|same:password',
            ],
            [
                'email.required' => 'Email là trường bắt buộc',
                'email.email' => 'Email không đúng định dạng',
                'email.unique' => 'Email đã có người sử dụng',
                'password.required' => 'Mật khẩu là trường bắt buộc',
                'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự',
                're_password.same' => 'Mật khẩu không khớp',
            ]

            );
            $user=new User();

            $user->full_name = $request->full_name;
            $user->email=$request->email;
            $user->address=$request->address;
            $user->phone=$request->phone;
            $user->password=hash::make($request->password);
            $user->save();
            return redirect('login');
        
        
    }

}
