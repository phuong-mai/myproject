<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Session;
use App\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('Login');
    }

    public function login(Request $request)
    {
        $this->validate($request,
            ['email' =>'required|email',
            'password' => 'required|min:6'],
            ['email.required' => 'Email là trường bắt buộc',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự']
    
            );
            $email = $request->input('email');
		    $password = $request->input('password');
            if(Auth::attempt(['email'=>$email,'password'=>$password]))
            {
               
                return redirect('index');
            }
            
            return redirect()->back()->with(['tt'=>'success','mess'=>'Đăng nhập không thành công']);
        
        
    }

    public function logout()
    {
        Auth::logout();
        return redirect('page.index');
    }

}
