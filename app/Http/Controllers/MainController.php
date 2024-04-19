<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Log;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        $product = Product::latest()->paginate(20);
        return view('welcome')->with('products', $product);
    }
    public function customer()
    {
        $customer = Customer::latest()->paginate(20);
        return view('customer')->with('customers', $customer);
    }
    public function order()
    {
        $order = Order::latest()->paginate(20);
        return view('order')->with('orders', $order);
    }
    public function category()
    {
        $category = Category::latest()->paginate(20);
        return view('category')->with('categories', $category);
    }
    public function orderItem()
    {
        $orderItem = OrderItem::latest()->paginate(20);
        return view('orderItems')->with('orderItems', $orderItem);
    }
}
