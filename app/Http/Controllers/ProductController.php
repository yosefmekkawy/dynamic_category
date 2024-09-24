<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFormRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\QuestionAnswers;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::query()->with('questions')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::with('questions')->get();
        return view('products.create', compact('categories'));
    }

    public function store(ProductFormRequest $request)
    {
        $product = Product::create($request->only(['name', 'description', 'price', 'category_id']));

        foreach ($request->questions as $questionId => $answer) {
                QuestionAnswers::create([
                'product_id' => $product->id,
                'question_id' => $questionId,
                'answer' => $answer,
            ]);
        }

        return redirect()->route('products.index');
    }
}
