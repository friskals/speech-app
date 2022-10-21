<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\StoreRequest;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function store(StoreRequest $request)
    {
        try {
            $request = $request->validated();

            Blog::create($request);

            return response()->json(['result' => true]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function index(Request $request){
        $blogs = Blog::paginate($request->paginate);
        return response()->json($blogs); 
    }

    public function show(Blog $blog){
        return response()->json(['data'=>$blog]); 
    }

    public function update(Blog $blog, Request $request){

        $blog->update([
            'image'=> $request->image,
            'excerpt' => $request->excerpt,
            'title' => $request->title, 
            'category_id' => $request->category_id,
            'content' => $request->content,
            'author' => $request->author
        ]);
        
        return response()->json(true); 
    }
}
