<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\Customer;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = Customer::latest()->paginate(20);
        return view('customer')->with('customers', $customer);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create')->with([
            'customers' => Customer::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $customer = Customer::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);
        $log = new Log();
        $log->title = json_encode($log->attributes);
        $log->description = 'Yangi mijoz qo\'shili: ' . $customer->toJson();
        $log->created_by = Auth::id();
        $log->save();

        return redirect()->route('customer.index');
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
    public function destroy(Customer $customer)
    {
        $log = new Log();
        $log->title = json_encode($log->attributes);
        $log->description = 'DELETE Customer id=' . $customer->id;
        $log->created_by = Auth::id();
        $log->save();
        $customer->delete();
        return redirect()->route('customer.index');
    }
}
