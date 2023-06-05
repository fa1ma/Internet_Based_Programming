<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = Data::where('name', 'LIKE', "%$query%")->get();
        return view('search.results', compact('results'));
    }
}
