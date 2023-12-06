<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    //list category 
    public function list(){
        $data = Category::latest()->get();

        return view('category',['categories'=>$data]);
    }

    //view form
    public function form($id=false) {
        $data = new Category();
        if($id){
            $data = Category::findOrFail($id);
        }
        return view('category-save',['category'=>$data]);
    }

    //add category
    public function create(Request $request,$id=false){
        
        $validator = Validator::make($request->all(),[
            'category'=>'required|string'
        ]);

        if($validator->fails()){
            return redirect()->route('category-create')->withErrors($validator);
        }

        if($id){
            $category = Category::findOrFail($id);
        }else{
            $category = new Category();
        }

        $category->category = $request->category;
        $category->save();

        return redirect()->route('category-list');
    }

    public function delete($id){
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('category-list');
    }

}
