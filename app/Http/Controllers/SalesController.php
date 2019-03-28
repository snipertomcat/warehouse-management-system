<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sales;
use App\Products;

class SalesController extends Controller
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
                'product_id' => 'required',
                'quantity' => 'required|integer|min:0'
            ]);

            $sale = new Sales([
                'product_id' => $request->get('product_id'),
                'quantity' => $request->get('quantity')
            ]);
            $sale->save();
            return redirect('/sales')->with('success', 'Sale added!');
        } else {
            return redirect('/sales')->with('error', 'Product ID doesn\'t exist!');
        }
    }

    public function edit($id)
    {
        $sale = Sales::find($id);
        return view('sales-edit', compact('sale'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'product_id' => 'required',
            'quantity' => 'required|integer|min:0'
        ]);

        $sale = Sales::find($id);
        $sale->product_id = $request->get('product_id');
        $sale->quantity = $request->get('quantity');

        $sale->save();
        return redirect('/sales')->with('success', 'Sale updated!');
    }

    public function destroy($id)
    {
        $sale = Sales::find($id);
        try{
            $sale->delete();
        } catch(\Illuminate\Database\QueryException $ex){
            return redirect('/sales')->with('error', 'Cannot delete record due to use as foreign key!');
        }

        return redirect('/sales')->with('success', 'Sale deleted!');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sales::all();
        return view('sales', compact('sales'));
    }
}
