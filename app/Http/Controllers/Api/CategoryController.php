<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\CourseResource;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();

        return new CourseResource(true, 'List Data Posts', $category);
    }

    public function show($id)
    {
        $category = Category::with('subcategories.contents')->where('id', $id)->first();

        if ($category) {
            return new CourseResource(true, 'Detail Data Post', $category);
        } else {
            return new CourseResource(false, 'Data Post Not Found', null);
        }
    }
}
