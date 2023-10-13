<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Closure;

class AdminController extends Controller
{
   public function AdminDashboard()
   {

       return view('admin.dashboard');
   }
   //end method

    public function AdminLogin(){
       return view('admin.login');
    }
    //end method

    public function AdminProfile(){
        $adminData = User::query()->find(Auth::user()->id);
       return view('admin.profile',compact('adminData'));
    }
    //end method
    public function UpdateProfile(Request $request){
//      dd($request->all());
        $id = Auth::user()->id;
        $data = User::query()->find($id);
        $data->name =$request->name;
        $data->username =$request->username;
        $data->phone =$request->phone;
        $data->address =$request->address;
        $data->updated_at = Carbon::now();
        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/adminImages/' . $data->photo));

            $filename = $id . "_" . $file->getClientOriginalName();
            $file->move(public_path('upload/adminImages'), $filename);
            $data['photo'] = $filename;
        }
        $data->save();
        return redirect()->route('admin.profile')->with('Profileupdated','Admin Profile Updated');
    }
    //end mehtod

    public function ChangePassword(){
        $adminData = User::query()->find(Auth::user()->id);
       return view('admin.change_password',compact('adminData'));
    }//end method

    public  function UpdatePassword(Request $request)
    {
        // validation
        $request->validate([
            'old_password' =>['required',
                function (string $attribute, mixed $value, Closure $fail) {
                    if (!Hash::check($value,Auth::user()->password)) {
                        $fail("The Old Password is not Match !");
                    }
                },
            ],
            'new_password'=>'required|confirmed|min:3'

        ]);

        if (!Hash::check($request->old_password,Auth::user()->password)){
            $notification = array(
                'message' => 'Old Password Does not Match ! ',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
        //Update The new password
        $id=Auth::user()->id;
        User::whereid(auth()->user()->id)->update([
            'password'=>Hash::make($request->new_password),
        ]);
        $notification = array(
            'message' => 'Password Change Successfully Relogin! ',
            'alert-type' => 'success'
        );
//        return  redirect('admin/logout')->with($notification);
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();


        return redirect('admin/login')->with('passwordupdated','password updated');

    }//End UpdatePassword method
}
