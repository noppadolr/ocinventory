<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
Use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        $validate = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);
        $user = User::where('username', "=", $request->username)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
                if(Auth::attempt($validate))
                {
                    $notification = array(
                        'message' => 'User Loin Successfully',
                        'alert-type' => 'success'
                    );
                    $request->session()->regenerate();
                    if ($user->role === 'admin') {
                        return redirect()->intended('admin/dashboard')->with('logedin','Log in complete');
                    }elseif ($user->role === 'manager'){
                        return redirect()->intended('manager/dashboard')->with($notification);

                    }else{
                        return redirect()->intended('dashboard')->with($notification);
                    }

                }else
                {
                    return back()->with('loginError','LOGIN FAILED');
                }
            }else{
                return back()->with('loginError','Username หรือ รหัสผ่าน ไม่ถูกต้อง');
            }
        }
//        else{
//            return back()->with('loginError','');
//        }


    }
    //    End AdminLoginView method

    public function AdminLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        $notification = array(
            'message' => 'Logout Successfully',
            'alert-type' => 'success'
        );

        return redirect('/')->with($notification)->with('logedout','log out complete');
    }//End method



}
