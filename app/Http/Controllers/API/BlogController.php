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
}
