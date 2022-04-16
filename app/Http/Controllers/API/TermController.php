<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Term\IndexRequest;
use App\Http\Requests\Term\StoreRequest;
use App\Libraries\PagingCounter;
use App\Models\Term;

class TermController extends Controller
{
    public function store(StoreRequest $request){
        $request = $request->validated();
        
        Term::create($request);
        
        return response()->json(['result'=>true]);
    }

    public function index(IndexRequest $request){
        $terms = Term::orderBy('created_at', 'desc');
        
        $terms = $terms->paginate(PagingCounter::countItemPerPage($terms,$request));
        
        return $terms;
    }

    public function destroy($id){
        $term = Term::findOrFail($id);
        
        $term->delete();
        
        return response()->json(['result'=>true]);
    }
}
