<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $products = Product::orderByRaw('ISNULL(status), status ASC')->get();
        $products = Product::all();

        if($request->has('has_deleted')) {
            $products = Product::onlyTrashed()->get();
        }
        // 
        // $products = DB::table('products')
        //     ->orderBy('status','desc')
        //     ->get();

        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $validated = $request->validate([
            'name' => 'required',
            'quantity' => 'required|integer',
        ]); 
        $product = Product::create([
            'name' => $request->input('name'),
            'quantity' => $request->input('quantity')
        ]);

        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $product = Product::find($product->id);
        return view('products.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product = Product::where('id', $product->id)->update([
            'name' => $request->input('name'),
            'quantity' => $request->input('quantity')
        ]);

        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product = Product::find($product->id);
        $product->delete();
        return redirect('/products');
    }
    
    public function forceDelete($id) //parameter need to change to variable id
    {
        $product = Product::onlyTrashed()->find($id); //parameter will get value from this id
        $product->forceDelete();
        return redirect('/products');
    }

    public function restore($id) {
        Product::withTrashed()->find($id)->restore();
        return redirect('/products');
    }
}
