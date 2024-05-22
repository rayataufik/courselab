<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Content;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $category = Category::all();

        return view('pages.home', [
            'categories' => $category
        ]);
    }

    public function show(string $slug)
    {
        $category = Category::with('subcategories.contents')->where('slug', $slug)->first();
        return view('pages.course.category', [
            'category' => $category
        ]);
    }

    public function showCourse(string $slug)
    {
        $course = Content::where('slug', $slug)->first();

        return view('pages.course.course', [
            'course' => $course
        ]);
    }
}
