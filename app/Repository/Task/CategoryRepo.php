<?php

namespace App\Repository\Task;

use App\Models\Task\Category;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryRepo
{

    public function index()
    {
        
        $categories = Category::all();
        return response()->json($categories);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required'
        ]);
    
        $category = new Category();
        $category->title = $request->title;
       
        $category->save();
        return response()->json('Category is Added');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json('category is deleted');
    }
  
}
