<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataOrder = Order::all();
        return view('customer.order.index', compact(['dataOrder']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $dataProduct = Product::findOrFail($id);
        return view('customer.order.create', compact(['dataProduct']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'order_quantity' => 'required|numeric',
            'total_price' => 'required',
            'delivery_date' => 'required'
        ]);

        $dataOrder = new Order();
        $dataOrder->fill($request->all());
        $dataOrder->user_id = $request->user_id;
        $dataOrder->prod_id = $request->prod_id;
        $dataOrder->order_quantity = $request->order_quantity;
        $dataOrder->delivery_date = $request->delivery_date;
        $dataOrder->total_price = intval(str_replace(['Rp', "\u{A0}", '.', ',00'], '', $request->total_price));
        $dataOrder->save();

        return redirect()->route('customer-order.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
    public function destroy(string $id)
    {
        //
    }
}
