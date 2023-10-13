<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\customer;

class CustomerController extends Controller
{
    public function index(){
        $customer = customer::query()->latest()->get();
        return view('backend.customer.customer_all',compact('customer'));
    }//end Method

    public function CustomerAdd(Request $request){
        dd($request->all());
    }//End method


    public function CustomerDelete($id)
    {
        customer::query()->findOrFail($id)->delete();
        return response()->json([

            'success' => 'Record deleted successfully!'

        ]);

    }
    //end method
}
