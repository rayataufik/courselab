<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\CourseResource;
use App\Models\Content;

class CourseController extends Controller
{
    public function index()
    {
        $course = Content::all();

        return new CourseResource(true, 'List Data Posts', $course);
    }

    public function show($id)
    {
        $course = Content::find($id);

        if ($course) {
            return new CourseResource(true, 'Detail Data Post', $course);
        } else {
            return new CourseResource(false, 'Data Post Not Found', null);
        }
    }
}
