<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataProduct = Product::all();
        return view('merchant.product.index', compact(['dataProduct']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('merchant.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'prod_title' => 'required',
            'prod_description' => 'required|max:255',
            'prod_image' => 'required|image|mimes:jpeg,jpg,png|max:5120',
            'prod_price' => 'required'
        ]);

        $prodImage = $request->file('prod_image');
        $prodImage->storeAs('public/merchant/products', $prodImage->hashName());

        $dataProduct = new Product();
        $dataProduct->fill($request->all());
        $dataProduct->user_id = $request->user_id;
        $dataProduct->prod_title = $request->prod_title;
        $dataProduct->prod_description = $request->prod_description;
        $dataProduct->prod_image = 'storage/merchant/products/' . $prodImage->hashName();
        $dataProduct->prod_price = intval(str_replace(['Rp', "\u{A0}", '.', ',00'], '', $request->prod_price));
        $dataProduct->save();

        return redirect()->route('merchant-product.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dataProduct = Product::findOrFail($id);
        return view('merchant.product.show', compact(['dataProduct']));
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
