<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    // Fetch Category
    public function get_category()
    {
        $category = Category::orderBy('created_at', 'DESC')->paginate(8);
        return view('admin.category', compact('category'));
    }

    // Create Categore 
    public function show_category()
    {
        return view('admin.addcategory');
    }
    public function create_category(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:categories,name|max:255',
            'Status' => 'required|in:active,deactive',
        ]);

        if ($validator->fails()) {
            return redirect()->route('showCategore')->withInput()->withErrors($validator);
        }

        $cate = new Category();
        $cate->name = $request->name;
        $cate->slug = Str::slug($request->name);
        $cate->status = $request->Status;
        $cate->save();

        return redirect()->route('showCategore')->with('success', 'Category created successfully!');
    }

    // Edit Category
    public function category_edit($id)
    {
        $cate_edit = Category::find($id);
        return view('admin.editcategory', ['category' => $cate_edit]);
    }

    // Update Category
    public function category_update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:users|max:255',
            'Status' => 'required|in:active,deactive',
        ]);

        if ($validator->fails()) {
            return redirect()->route('showCategore', ['id' => $id])->withInput()->withErrors($validator);
        }

        $cate = Category::find($id);
        $cate->name = $request->name;
        $cate->slug = Str::slug($request->name);
        $cate->status = $request->Status;
        $cate->save();

        return redirect()->route('edit_category', ['id' => $id])->with('success', 'Category Update successfully!');
    }

    // Delete Category
    public function category_delete($id)
    {
        $cate = Category::findOrFail($id);
        $cate->delete();

        return redirect()->route('all_category', ['id' => $id]);
    }

    // Filter Category
    public function filter_category(Request $request)
    {
        $query = Category::query();

        // Apply filters
        if ($request->has('search_data')) {
            $searchData = $request->input('search_data');
            $query->where('name', 'like', "%$searchData%")
                ->orWhere('slug', 'like', "%$searchData%")
                ->orWhere('status', 'like', "%$searchData%");
        }

        // Paginate the results
        $category = $query->paginate(8)->appends($request->query());

        return view('admin.category', compact('category'));
    }

    // Category pdf
    public function pdf_category()
    {
        $cate = Category::get();

        $data = [
            'title' => 'Category List',
            'date' => date('d/m/Y'),
            'cate' => $cate
        ];
        $pdf = Pdf::loadView('pdf.category', $data);
        return $pdf->download('category.pdf');
    }
}
