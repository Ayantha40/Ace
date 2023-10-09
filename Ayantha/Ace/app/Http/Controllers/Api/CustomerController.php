<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index(){
        $customers = User::where('is_admin',0)->get();
        return response()->json([
            'customers' => $customers
        ], 200);
    }

    public function getSingle($id){
        $customer = User::where('is_admin', 0)->where('id', $id)->get();
        if(!$customer){
            return response()->json([
                'message' => 'Customer Not Found'
            ],404); 
        }

        return response()->json([
            'customer' => $customer
        ],200);
    }

    public function addNew(Request $request){
        try{
            User::create(
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'mobile' => $request->mobile,
                    'address' => $request->address,
                    'date_of_birth' => $request->dob,
                    'password' =>  Hash::make($request->password),
                ]
                );
                return response()->json([
                    'message' => "User successfully created"
                ], 200);
        }
        catch (\Exception $e) {
            return response()->json([
                'error' => "Something went wrong: ",
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function delete($id){
        $customer = User::where('is_admin', 0)->find($id);
            
        if (!$customer) {
            return response()->json([
                'message' => 'Customer Not Found'
            ], 404);
        }

        $customer->delete();
        
        return response()->json([
            'message' => "Customer deleted successfully"
        ], 200);

     }

     public function update(Request $request, $id){
        try {
            // Find customer
            $customer = User::where('is_admin', 0)->find($id);
            
            if (!$customer) {
                return response()->json([
                    'message' => 'Customer Not Found'
                ], 404);
            }
    
            $customer->name = $request->input('name');
            $customer->email = $request->input('email');
            $customer->mobile = $request->input('mobile');
            $customer->address = $request->input('address');
            $customer->date_of_birth = $request->input('dob');
            $customer->password = Hash::make($request->input('password'));
    
            $customer->save();
    
            return response()->json([
                'message' => "Customer details updated successfully"
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => "Something went wrong: ",
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
