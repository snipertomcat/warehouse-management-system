<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deliveries;
use App\Sales;

class DeliveriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {

        if (Sales::where('id', '=', $request->get('sale_id'))->count() > 0) {
            $this->validate($request, [
                'sale_id' => 'required|unique:deliveries',
                'recipient' => 'required',
                'address' => 'required',
                'expected_arrival' => 'required|date|after:tomorrow',
                'actual_arrival' => 'nullable|date|after:expected_arrival',
                'status' => 'required',
                'description' => 'required'
            ]);

            $delivery = new Deliveries([
                'sale_id' => $request->get('sale_id'),
                'recipient' => $request->get('recipient'),
                'address' => $request->get('address'),
                'expected_arrival' => $request->get('expected_arrival'),
                'actual_arrival' => $request->get('actual_arrival'),
                'status' => $request->get('status'),
                'description' => $request->get('description'),
            ]);
            $delivery->save();
            return redirect('/deliveries')->with('success', 'Delivery added!');
        } else {
            return redirect('/deliveries')->with('error', 'Sale ID doesn\'t exist!');
        }
    }

    public function edit($id)
    {
        $delivery = Deliveries::find($id);
        return view('deliveries-edit', compact('delivery'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'sale_id' => 'required|unique:deliveries',
            'recipient' => 'required',
            'address' => 'required',
            'expected_arrival' => 'required|date|after:tomorrow',
            'actual_arrival' => 'nullable|date|after:expected_arrival',
            'status' => 'required',
            'description' => 'required'
        ]);

        $delivery = Deliveries::find($id);
        $delivery->sale_id = $request->get('sale_id');
        $delivery->name = $request->get('name');
        $delivery->price = $request->get('price');
        $delivery->description = $request->get('description');

        $delivery->save();
        return redirect('/deliveries')->with('success', 'Delivery updated!');
    }

    public function destroy($id)
    {
        $delivery = Deliveries::find($id);
        $delivery->delete();

        return redirect('/deliveries')->with('success', 'Delivery deleted!');
    }

    public function index()
    {
        $deliveries = Deliveries::all();
        return view('deliveries', compact('deliveries'));
    }
}
