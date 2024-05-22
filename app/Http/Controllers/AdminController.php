<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Content;
use App\Models\Subcategory;
use Illuminate\Support\Str;
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

    public function updateCategory(Request $request, Category $category, $slug)
    {
        $category = Category::where('slug', $slug)->first();
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png|max:2048',
        ]);

        if ($request->file('image')) {
            if ($category->image) {
                Storage::delete($category->image);
            }
            $validatedData['image'] = $request->file('image')->store('categories_images', 'public');
        }

        $validatedData['slug'] = Str::slug($validatedData['name']);

        $category->update($validatedData);

        return redirect('/admin/categories')->with('SuccessAlert', 'Category Updated Successfully!');
    }

    public function deleteCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();

        if ($category->image) {
            Storage::delete($category->image);
        }

        $category->delete();

        return redirect('/admin/categories')->with('SuccessAlert', 'Category Deleted Successfully!');
    }

    public function showSubCategories()
    {
        return view('pages.admin.subcategory', [
            'subcategories' => Subcategory::all()
        ]);
    }

    public function createSubCategory()
    {
        return view('pages.admin.create_subcategory', [
            'categories' => Category::all()
        ]);
    }

    public function storeSubCategory(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required'
        ]);

        $validateData['slug'] = Str::slug($validateData['name']);

        Subcategory::create($validateData);

        return redirect('/admin/subcategory')->with('SuccessAlert', 'Subcategory Added Successfully!');
    }

    public function editSubCategory($slug)
    {
        $subcategory = Subcategory::where('slug', $slug)->first();

        return view('pages.admin.edit_subcategory', [
            'subcategory' => $subcategory,
            'categories' => Category::all()
        ]);
    }

    public function updateSubCategory(Request $request, Subcategory $subcategory, $slug)
    {
        $subcategory = Subcategory::where('slug', $slug)->first();
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required'
        ]);

        $validatedData['slug'] = Str::slug($validatedData['name']);

        $subcategory->update($validatedData);

        return redirect('/admin/subcategory')->with('SuccessAlert', 'Subcategory Updated Successfully!');
    }

    public function deleteSubCategory($slug)
    {
        $subcategory = Subcategory::where('slug', $slug)->first();

        $subcategory->delete();

        return redirect('/admin/subcategory')->with('SuccessAlert', 'Subcategory Deleted Successfully!');
    }

    public function showContent()
    {
        return view('pages.admin.content', [
            'contents' => Content::all()
        ]);
    }

    public function createContent()
    {
        return view('pages.admin.create_content', [
            'categories' => Category::all()
        ]);
    }

    public function getSubcategories(Request $request)
    {
        $categoryId = $request->input('category_id');
        $subcategories = Subcategory::where('category_id', $categoryId)->get();
        return response()->json($subcategories);
    }

    public function storeContent(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required|string|max:255',
            'subcategory_id' => 'required',
            'image' => 'required|image|mimes:jpg,png|max:2048',
            'content' => 'required|string'
        ]);

        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('contents_images', 'public');
        }

        $validateData['slug'] = Str::slug($validateData['title']);

        Content::create($validateData);

        return redirect('/admin/content')->with('SuccessAlert', 'Content Added Successfully!');
    }

    public function editContent($slug)
    {
        $content = Content::where('slug', $slug)->first();

        return view('pages.admin.edit_content', [
            'content' => $content
        ]);
    }

    public function updateContent(Request $request, Content $content, $slug)
    {
        $content = Content::where('slug', $slug)->first();
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png|max:2048',
            'content' => 'required|string'
        ]);

        if ($request->file('image')) {
            if ($content->image) {
                Storage::delete($content->image);
            }
            $validatedData['image'] = $request->file('image')->store('contents_images', 'public');
        }

        $validatedData['slug'] = Str::slug($validatedData['title']);

        $content->update($validatedData);

        return redirect('/admin/content')->with('SuccessAlert', 'Content Updated Successfully!');
    }

    public function deleteContent($slug)
    {
        $content = Content::where('slug', $slug)->first();

        if ($content->image) {
            Storage::delete($content->image);
        }

        $content->delete();

        return redirect('/admin/content')->with('SuccessAlert', 'Content Deleted Successfully!');
    }
}
