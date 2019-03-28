<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sales;
use App\Deliveries;
Use App\Stocks;
Use App\Products;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware("auth");
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $sales_data = Sales::with("sales")->count();
        $deliveries_data = Deliveries::with("deliveries")->count();
        $stock_data = Stocks::with("stock")->count();
        $products_data = Products::with("products")->count();

        return view("dashboard", compact("sales_data", "deliveries_data", "stock_data", "products_data"));
    }
}
