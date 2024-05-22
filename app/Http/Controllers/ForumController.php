<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.forum.forum', [
            'threads' => Thread::all()->sortByDesc('created_at')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.forum.create_forum');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $validatedData['user_id'] = $user->id;

        $validatedData['slug'] = strtolower(str_replace(' ', '-', $request->title));

        $originalSlug = $validatedData['slug'];
        $counter = 1;
        while (Thread::where('slug', $validatedData['slug'])->exists()) {
            $validatedData['slug'] = $originalSlug . '-' . $counter;
            $counter++;
        }

        Thread::create($validatedData);

        return redirect('/forum')->with('success', 'Thread added successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        return view('pages.forum.show_post', [
            'thread' => Thread::where('slug', $slug)->first()
        ]);
    }

    public function storeReply(Request $request, $threadId)
    {
        $request->validate([
            'body' => 'required|string'
        ]);

        Post::create([
            'thread_id' => $threadId,
            'user_id' => Auth::id(),
            'body' => $request->body
        ]);

        return redirect()->back()->with('success', 'Reply posted successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
