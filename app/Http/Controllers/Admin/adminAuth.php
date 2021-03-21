<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Admin;
use App\Mail\AdminResetPassword;
use DB;
use Carbon\Carbon;
//use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class adminAuth extends Controller
{
    public function login ()
    {
       return view('admin.login');
    }

    public function doLogin ()

    {
        $rememberme = request('rememberme') == 1 ? true: false;
        if(admin()->attempt(['email'=>request('email'),'password'=>request('password')],$rememberme
            ))
        {
            return redirect('admin/home');
        } else {
            session()->flash('error', trans('admin.incorrect_information_login'));
            return redirect('admin/login');
        }
    }

    public function logout ()
    {
        auth()->guard('admin')->logout();
        return redirect('admin/login');
    }

    public function forgetPassword ()

    {
        return view('admin/forget_password');
    }

    public function forgotPassword ()

    {
        $admin = Admin::where('email',request('email'))->first();
        if(!empty($admin))

        {
            $token = app('auth.password.broker')->createToken($admin);
            $data = DB::table('password_resets')->insert([
               'emai'           =>  $admin->email,
                'token'         =>  $token,
                'created_at'    =>  Carbon::now(),
            ]);
            return new AdminResetPassword(['data'=>$admin, 'token'=>$token]);
        }
        return back();
    }
}
