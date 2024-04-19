<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\Log;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $item = OrderItem::latest()->paginate(20);
        return view('orderItems')->with('items', $item);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('item.create')->with([
            'products' => Product::all(),
            'orders' => Order::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $item = OrderItem::create([
            'user_id' => auth()->user()->id,
            'product_id' => $request->product_id,
            'order_id' => $request->order_id,
            'quantity' => $request->quantity,
            'price' => $request->price,
        ]);
        $log = new Log();
        $log->title = json_encode($log->attributes);
        $log->description = 'Yangi buyum buyurtma qilindi: ' . $item->toJson();
        $log->created_by = Auth::id();
        $log->save();

        return redirect()->route('items.index');
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
    public function destroy(OrderItem $item)
    {
        $log = new Log();
        $log->title = json_encode($log->attributes);
        $log->description = 'DELETE Order Item id=' . $item->id;
        $log->created_by = Auth::id();
        $log->save();

        $item->delete();

        return redirect()->route('items.index');
    }
}
