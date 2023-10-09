<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
class AdminController extends Controller
{

    public function index()
    {
        $data=product::all();
        $customers = User::where('is_admin', 0)->get();
        return view('admin.customers',compact('data','customers'));
    }
    public function uploadteam(Request $request){

       $data= new Product;
        
        $image=$request->image;
        
        $imagename=time().'.'.$image->getClientOriginalExtension();
        
         $request->image->move('itemimage',$imagename);
        
         $data->image=$imagename;
        
        $data->name=$request->name;
        
         $data->price=$request->position;
        
        $data->save();
        
         return redirect()->back();
        }

        
}
