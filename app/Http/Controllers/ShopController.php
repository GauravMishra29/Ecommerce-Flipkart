<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
//     private $products = [
//         [
//             'id' => 1,
//             'name' => 'iPhone 15',
//             'price' => 79999,
//             'image' => 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9',
//             'category' => 'Mobiles',
//             'description' => 'Latest Apple smartphone'
//         ],
//         [
//             'id' => 2,
//             'name' => 'HP Laptop',
//             'price' => 55999,
//             'image' => 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853',
//             'category' => 'Electronics',
//             'description' => 'Powerful laptop for work'
//         ],
//         [
//             'id' => 3,
//             'name' => 'Nike Shoes',
//             'price' => 3999,
//             'image' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff',
//             'category' => 'Fashion',
//             'description' => 'Comfortable running shoes'
//         ],
//         [
//             'id' => 4,
//             'name' => 'Smart Watch',
//             'price' => 2999,
//             'image' => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30',
//             'category' => 'Gadgets',
//             'description' => 'Track your fitness'
//         ],
//         [
//     'id' => 5,
//     'name' => 'Sony Headphones',
//     'price' => 4999,
//     'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e',
//     'category' => 'Electronics',
//     'description' => 'Wireless noise cancelling headphones'
// ],

// [
//     'id' => 6,
//     'name' => 'Canon DSLR Camera',
//     'price' => 45999,
//     'image' => 'https://images.unsplash.com/photo-1516035069371-29a1b244cc32',
//     'category' => 'Camera',
//     'description' => 'Professional DSLR camera'
// ],

// [
//     'id' => 7,
//     'name' => 'Gaming Keyboard',
//     'price' => 2499,
//     'image' => 'https://images.unsplash.com/photo-1511467687858-23d96c32e4ae',
//     'category' => 'Gaming',
//     'description' => 'RGB mechanical gaming keyboard'
// ],

// [
//     'id' => 8,
//     'name' => 'Backpack',
//     'price' => 1499,
//     'image' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee',
//     'category' => 'Fashion',
//     'description' => 'Stylish travel backpack'
// ],
//  [
//             'id' => 1,
//             'name' => 'iPhone 15',
//             'price' => 79999,
//             'image' => 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9',
//             'category' => 'Mobiles',
//             'description' => 'Latest Apple smartphone'
//         ],
//         [
//             'id' => 2,
//             'name' => 'HP Laptop',
//             'price' => 55999,
//             'image' => 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853',
//             'category' => 'Electronics',
//             'description' => 'Powerful laptop for work'
//         ],
//         [
//             'id' => 3,
//             'name' => 'Nike Shoes',
//             'price' => 3999,
//             'image' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff',
//             'category' => 'Fashion',
//             'description' => 'Comfortable running shoes'
//         ],
//         [
//             'id' => 4,
//             'name' => 'Smart Watch',
//             'price' => 2999,
//             'image' => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30',
//             'category' => 'Gadgets',
//             'description' => 'Track your fitness'
//         ],
//     ];

    public function home()
{
    $products = Product::latest()->get();

    $categories = Product::select('category')
        ->distinct()
        ->pluck('category');

    return view('home', compact('products', 'categories'));
}

    // Single Product
    public function product($id)
    {
        $product = Product::findOrFail($id);

        return view('product', compact('product'));
    }

    // Store Product
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
            'description' => 'required',
            'image' => 'required|image'
        ]);

        $imagePath = $request->file('image')->store('products', 'public');

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'category' => $request->category,
            'description' => $request->description,
            'image' => $imagePath
        ]);

        return redirect('/')->with('success', 'Product Added Successfully');
    }

    // Add To Cart
    public function addToCart($id)
    {
        $cart = session()->get('cart', []);

        $product = Product::findOrFail($id);

        if(isset($cart[$id])){

            $cart[$id]['quantity']++;

        } else {

            $cart[$id] = [
                "id" => $product->id,
                "name" => $product->name,
                "price" => $product->price,
                "image" => $product->image,
                "quantity" => 1
                
            ];
        }

        session()->put('cart', $cart);

        return redirect('/cart');
    }

    // Cart Page
    public function cart()
    {
        $cart = session()->get('cart', []);

        return view('cart', compact('cart'));
    }

    // Remove From Cart
    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$id])){
            unset($cart[$id]);
        }

        session()->put('cart', $cart);

        return redirect('/cart');
    }

    // Place Order
    public function placeOrder()
    {
        session()->forget('cart');

        return redirect('/')
            ->with('success', 'Order Placed Successfully!');
    }

    // Category Page
    public function category($category)
{
    $products = Product::where('category', $category)->get();

    return view('category', compact('products', 'category'));
}

    // Search Products
    public function search(Request $request)
    {
        $query = $request->search;

        $products = Product::where(
            'name',
            'LIKE',
            "%{$query}%"
        )->get();

        return view('search', compact('products', 'query'));
    }

    // Address Page
    public function address()
    {
        return view('address');
    }

    // Orders
    public function yourOrders()
    {
       return redirect('/');
    }


public function increaseCart($id)
{
    $cart = session()->get('cart');

    if(isset($cart[$id])){

        $cart[$id]['quantity']++;

    }

    session()->put('cart', $cart);

    return redirect()->back();
}

public function decreaseCart($id)
{
    $cart = session()->get('cart');

    if(isset($cart[$id])){

        if($cart[$id]['quantity'] > 1){

            $cart[$id]['quantity']--;

        }

    }

    session()->put('cart', $cart);

    return redirect()->back();
}

}