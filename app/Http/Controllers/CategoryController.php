<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        #list kategori
        $categories = Category::all();

        #mengemmbalikan data ke view
        return view('backend.categories.index',compact('categories'));
    }

    public function add()
    {
        return view('backend.categories.add');
    }

    // public function store(Request $request){
    //     $category = new Category();
    //     $category->name = $request->name;
    //     $category->save();

    //     return redirect()->route('category.index');
    // }
    
}
