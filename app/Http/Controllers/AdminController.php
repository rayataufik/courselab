<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        return view('pages.admin.dashboard');
    }

    public function showCategories()
    {

        return view('pages.admin.category', [
            'categories' => Category::all()
        ]);
    }

    public function createCategory()
    {
        return view('pages.admin.create_category');
    }

    public function storeCategory(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|file|mimes:jpg,png|max:2048',
        ]);

        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('categories_images', 'public');
        }

        $validateData['slug'] = strtolower(str_replace(' ', '-', $request->name));

        Category::create($validateData);

        return redirect('/admin/categories')->with('SuccessAlert', 'Category Added Successfully!');
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $uploadedFile = $request->file('upload');
            $fileName = $uploadedFile->store('media', 'public');

            $url = asset('storage/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }

        return response()->json(['uploaded' => 0, 'error' => 'No file uploaded']);
    }



    public function editCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();

        return view('pages.admin.edit_category', [
            'category' => $category
        ]);
    }

    public function updateCategory(Request $request)
    {
        $category = Category::where('slug', $request->slug)->first();
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|file|mimes:jpg,png|max:2048',
        ]);

        if ($request->file('image')) {
            if ($request->image) {
                Storage::delete($category->image);
            }
            $validatedData['image'] = $request->file('image')->store('categories_images', 'public');
        }

        $validateData['slug'] = strtolower(str_replace(' ', '-', $request->name));

        Category::where('slug', $request->slug)->update($validateData);

        return redirect('/admin/categories')->with('SuccessAlert', 'Category Updated Successfully!');
    }
}
