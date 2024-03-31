<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function delete(Request $request){
        $product = product::find($request->id)->first();
        $product->delete();
        return response()->json(['message'=>'success']);
    }
    public function add(Request $request){
        $validator = Validator::make(
            $request->all(),
            [
                "name"=>"required",
                "price"=>"required",
                "image"=>"required",
                "description"=>"required",
                "condition"=>"required",
                "category_id"=>"required"
            ]
        );
        if($validator->fails()){
            return response()->json(["message"=>"Vui lòng kiểm tra dữ liệu nhập vào!"]);
        }
        $product = new product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->waranty = $request->waranty;
        $product->condition = $request->condition;
        $product->featured = $request->featured;
        $product->category_id	 = $request->category_id;
        $filename= $request->image->getClientOriginalName();
        $request->image->storeAs('public/productImages',$filename);
        $product->image = "http://localhost:8000/storage/productImages/".$filename;
        $product->save();
        return response()->json(["message"=>"success"]);
    }
    public function edit(Request $request){
        $validator = Validator::make(
            $request->all(),
            [
                "name"=>"required",
                "price"=>"required",
                "image"=>"required",
                "description"=>"required",
                "condition"=>"required",
                "category_id"=>"required"
            ]
        );
        if($validator->fails()){
            return response()->json(["message"=>"Vui lòng kiểm tra dữ liệu nhập vào!"]);
        }
        $product = product::find($request->id)->first();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->waranty = $request->waranty;
        $product->condition = $request->condition;
        $product->featured = $request->featured;
        $product->category_id = $request->category_id;
        if(!is_string($request->image)){
            $filename= $request->image->getClientOriginalName();
            $request->image->storeAs('public/productImages',$filename);
            $product->image = "http://localhost:8000/storage/productImages/".$filename;
        }
        $product->save();
        return response()->json(["message"=>"success"]);
    }
    public function getAll(Request $request){
        $products = product::where("category_id",$request->category_id)->get();
        return response()->json(["message"=>$products]);
    }
}
