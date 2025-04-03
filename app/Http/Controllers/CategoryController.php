<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        #list kategori
        $categories = Category::all();

        #mengemmbalikan data ke view
        return view('backend.categories.index', compact('categories'));
    }

    public function add()
    {
        return view('backend.categories.add');
    }

    public function store(Request $request)
    {
        $categories = new Category();
        $categories->name = $request->name;
        $categories->save();

        return redirect()->route('category.index')->with('status', 'Category added successfully');
    }
    public function edit($id)
    {

        $categories = Category::findOrFail($id);
        return view('backend.categories.edit', compact('categories'));
    }

    public function update(Request $request)
    {

        #memvalidasi data yang di input

        $this->validate($request, [
            'id' => 'required',
            'name' => 'required',
            'status' => 'required',
        ]);



        #menyimpam data
        $category = Category::findOrFail($request->id);
        $category->name = $request->name;
        $category->status = $request->status;
        $category->save();

        #kemnbali ke halaman
        return redirect()->route('category.index')->with('data', 'Category updated successfully');
    }

    public function delete($id)
    {
        $categories = Category::findOrFail($id);
        $categories->delete();

        return redirect()->route('category.index')->with('status', 'Category deleted successfully');
    }

    public function exportPdf()
    {
        $categories = Category::all();
        $pdf = Pdf::loadView('backend.categories.export', compact('categories'));
        return $pdf->download('Data categories.pdf');
    }
}
