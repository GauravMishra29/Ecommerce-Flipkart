<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required|image'
        ]);

        $imagePath = $request->file('image')
            ->store('products', 'public');

        Product::create([
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath
        ]);

        return redirect('/products');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    $data = [
        'name' => $request->name,
        'category' => $request->category,
        'description' => $request->description,
        'price' => $request->price,
    ];

    if ($request->hasFile('image')) {

        $data['image'] = $request->file('image')
            ->store('products', 'public');
    }

    $product->update($data);

    return redirect('/products')
        ->with('success', 'Product Updated');
}

    public function destroy($id)
    {
        Product::destroy($id);

        return redirect('/products');
    }
}