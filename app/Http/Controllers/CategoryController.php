<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $category = Category::create($request->only('name'));
//        dd($request);
        foreach ($request->questions as $data) {
            $category->questions()->create($data['type']);
        }

        return redirect()->route('categories.index');
    }

    public function create()
    {
        return view('categories.create');
    }
}
