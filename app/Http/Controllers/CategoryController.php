<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function add(Request $request){
        $validator = Validator::make($request->all(),
            [
                "name" => "required|unique:categories,name",
                "image" => "required",
                "description"=> "required"
            ]
        );
        if($validator->failed()){
            return response()->json(['message' => "Vui lòng kiểm tra dữ liêu nhập vào!"], 409);
        }
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $filename= $request->image->getClientOriginalName();
        $request->image->storeAs('public/categoryimages',$filename);
        $category->image = "http://localhost:8000/storage/categoryimages/".$filename;
        $category->save();
        return response()->json(["message" => "success"]);
    }
    public function getCategories(Request $request){
        return response()->json(["message"=>Category::all()]);
    }
}
