<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\Customer;
use App\Models\Log;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order = Order::latest()->paginate(20);
        return view('order')->with('orders', $order);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('order.create')->with([
            'customers' => Customer::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'customer_id' => $request->customer_id,
            'order_date' => $request->order_date,
            'status' => $request->status,
            'total_price' => $request->total_price,
        ]);
        $log = new Log();
        $log->title = json_encode($log->attributes);
        $log->description = 'Yangi buyurtma keldi: ' . $order->toJson();
        $log->created_by = Auth::id();
        $log->save();

        return redirect()->route('order.index');
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
    public function destroy(Order $order)
    {
        $log = new Log();
        $log->title = json_encode($log->attributes);
        $log->description = 'DELETE Customer id=' . $order->id;
        $log->created_by = Auth::id();
        $log->save();

        $order->delete();

        return redirect()->route('order.index');
    }
}
