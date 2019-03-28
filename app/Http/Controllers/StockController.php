<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stocks;
use App\Products;

class StockController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {

        if (Products::where('id', '=', $request->get('product_id'))->count() > 0) {
            $this->validate($request, [
                'product_id' => 'required|unique:stocks',
                'quantity' => 'required|integer|min:0'
            ]);

            $stock = new Stocks([
                'product_id' => $request->get('product_id'),
                'quantity' => $request->get('quantity')
            ]);
            $stock->save();
            return redirect('/stock')->with('success', 'Stock added!');
        } else {
            return redirect('/stock')->with('error', 'Product ID doesn\'t exist!');
        }
    }

    public function edit($id)
    {
        $stock = Stocks::find($id);
        return view('stock-edit', compact('stock'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'product_id' => 'required|unique:stocks',
            'quantity' => 'required|integer|min:0'
        ]);

        $stock = Stocks::find($id);
        $stock->product_id = $request->get('product_id');
        $stock->quantity = $request->get('quantity');

        $stock->save();
        return redirect('/stock')->with('success', 'Stock updated!');
    }

    public function destroy($id)
    {
        $stock = Stocks::find($id);
        $stock->delete();

        return redirect('/stock')->with('success', 'Stock deleted!');
    }

    public function index()
    {
        $stock = Stocks::all();
        return view('stock', compact('stock'));
    }
}
