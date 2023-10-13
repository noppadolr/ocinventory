<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{
    public function ManagerDashboard(){
        $managerData=User::query()->find(Auth::user()->id);
//        dd($managerData);
        return view('manager.dashboard',compact('managerData'));
    }
}
