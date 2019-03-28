<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;

class ProductsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'price' => 'required|integer|min:0',
            'description' => 'required'
        ]);

        $product = new Products([
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'description' => $request->get('description')
        ]);
        $product->save();
        return redirect('/products')->with('success', 'Product added!');
    }

    public function edit($id)
    {
        $product = Products::find($id);
        return view('products-edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required|integer|min:0',
            'description' => 'required'
        ]);

        $product = Products::find($id);
        $product->name = $request->get('name');
        $product->price = $request->get('price');
        $product->description = $request->get('description');

        $product->save();
        return redirect('/products')->with('success', 'Product updated!');
    }

    public function destroy($id)
    {
        $product = Products::find($id);
        try {
            $product->delete();
        } catch(\Illuminate\Database\QueryException $ex){
            return redirect('/products')->with('error', 'Cannot delete record due to use as foreign key!');
        }

        return redirect('/products')->with('success', 'Product deleted!');
    }

    public function index()
    {
        $products = Products::all();
        return view('products', compact('products'));
    }
}
