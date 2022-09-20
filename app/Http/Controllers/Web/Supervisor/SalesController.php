<?php

namespace App\Http\Controllers\Web\Supervisor;

use App\Models\Sales;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sales = Sales::join('products', 'sales.product_id', '=', 'products.id')
            ->join('branches', 'sales.branch_id', '=', 'branches.id')
            ->join('users', 'users.id', '=', 'sales.user_id')
            ->select('sales.*', 'products.name', 'branches.branch', 'users.email')
            ->get();
        // dd($sales);
        return view('dashboard.supervisor.sales.home', compact('sales'));
    }
}
