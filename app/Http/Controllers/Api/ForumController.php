<?php

namespace App\Http\Controllers\Api;

use App\Models\Thread;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;

class ForumController extends Controller
{
    public function index()
    {
        $forum = Thread::with("user")->get();

        return new CourseResource(true, 'List Data Forums', $forum);
    }

    public function show($id)
    {
        $forum = Thread::with("user")->with(['posts' => function ($query) {
            $query->with('user');
        }])->find($id);

        if ($forum) {
            return new CourseResource(true, 'Detail Data Forum', $forum);
        } else {
            return new CourseResource(false, 'Data Forum Not Found', null);
        }
    }
}
