<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
   
    public function autocomplete()
    {
        return view('autocomplete');
    }

    public function search(Request $request)
    {
        $categories = Category::where('category_name','LIKE',$request->search.'%')->get();

        return response()->json($categories);
    }
}