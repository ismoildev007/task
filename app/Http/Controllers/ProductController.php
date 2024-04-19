<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\Category;
use App\Models\Log;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::latest()->paginate(20);
        return view('welcome')->with('products', $product);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create')->with([
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $path = null;

        if ($request->hasFile('image_url')) {
            $name = $request->file('image_url')->getClientOriginalName();
            $path = $request->file('image_url')->storeAs('post_photo', $name);
        }

        $product = Product::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'description' => $request->description,
            'image_url' => $path ?? null,
        ]);

        $log = new Log();
        $log->title = json_encode($log->attributes);
        $log->description = 'Yangi mahsulot yaratildi: ' . $product->toJson();
        $log->created_by = Auth::id();
        $log->save();

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function destroy(Product $product, OrderItem $item)
    {
        $log = new Log();
        $log->title = json_encode($log->attributes) ;
        $log->description = 'DELETE product_id=' . $product->id;
        $log->created_by = Auth::id();
        $log->save();

        $item_id = $product->id;
        $item = OrderItem::where('product_id', $item_id)->first();
        if ($item) {
            $item->delete();
        } else {
            $product->delete();
        }

        $product->delete();
        return redirect()->route('product.index');
    }
}
