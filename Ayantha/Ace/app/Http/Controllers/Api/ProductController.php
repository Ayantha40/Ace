<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return response()->json([
            'products' => $products
        ], 200);
    }

    public function getSingle($id){
        $product = Product::where('id', $id)->get();
        if(!$product){
            return response()->json([
                'message' => 'Product Not Found'
            ],404); 
        }

        return response()->json([
            'product' => $product
        ],200);
    }

    public function addNew(Request $request){
        try{
            Product::create(
                [
                    'name' => $request->name,
                    'category_id' => $request->category_id,
                    'price' => $request->price,
                    'description' => $request->description,
                    'color' => $request->color,
                ]
                );
                return response()->json([
                    'message' => "Product successfully created"
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
        $product = Product::find($id);
            
        if (!$product) {
            return response()->json([
                'message' => 'product Not Found'
            ], 404);
        }

        $product->delete();
        
        return response()->json([
            'message' => "product deleted successfully"
        ], 200);

     }

     public function update(Request $request, $id){
        try {
            // Find customer
            $product = Product::find($id);
            
            if (!$product) {
                return response()->json([
                    'message' => 'product Not Found'
                ], 404);
            }
    
            $product->name = $request->input('name');
            $product->category_id = $request->input('category_id');
            $product->price = $request->input('price');
            $product->description = $request->input('description');
            $product->color = $request->input('color');
            $product->save();
    
            return response()->json([
                'message' => "Product details updated successfully"
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => "Something went wrong: ",
                'message' => $e->getMessage()
            ], 500);
        }
    }
}