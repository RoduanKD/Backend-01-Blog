<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $posts = Post::where('title', 'like', "%$request->q%")
            ->orWhere('content', 'like', "%$request->q%")
            ->orWhereHas('tags', function (Builder $query) use ($request) {
                $query->where('name', 'like', "%$request->q%");
            })
            ->paginate(10);
        
        // $tags = Tag::where('name', 'like', "%$request->q%")->paginate(10);

        return view('search.index', [
            'posts' => $posts,
            // 'tags' => $tags,
        ]);
    }
}
