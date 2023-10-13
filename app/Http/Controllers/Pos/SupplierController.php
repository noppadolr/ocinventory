<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\supplier;

class SupplierController extends Controller
{
    public function SupplierAll(){
        $supp = supplier::query()->latest()->get();
        return view('backend.supplier.supplier_all',compact('supp'));
    }
    //end method
    public function AddSupplier(Request $request){
//               dd($request->all());
        supplier::query()->insert([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'address'=>$request->address,
            'created_by'=>Auth::user()->id,
            'created_at'=>Carbon::now(),
        ]);
        return redirect()->route('supplier.all')->with('supplierAdded','Supplier Added');
    }
    //End AddSupplier method

    public function SupplierEdit($id){
        $supplier = supplier::query()->findOrFail($id);

    }
    //end SupplierEdit method
    public function UpdateSupplier(Request $request){
//        dd($request->all());
        $id = $request->id;

        Supplier::query()->findOrFail($id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),

        ]);
        return redirect()->route('supplier.all')->with('supplierEdited','Supplier Edited');
    }

//        end UpdateSupplier method
    public function SupplierDelete($id)
    {
        supplier::query()->findOrFail($id)->delete();
        return response()->json([

            'success' => 'Record deleted successfully!'

        ]);
//        return redirect()->route('supplier.all')->with('supplierDeleted','Supplier Deleted');
    }





}
