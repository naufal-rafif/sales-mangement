<?php

namespace App\Http\Controllers\Web\Superadmin;

use App\Models\Sales;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $sales = Sales::get();
        $sales = Sales::join('products', 'sales.product_id', '=', 'products.id')
            ->select('sales.*', 'products.name')
            ->get();
        // dd($sales);
        return view('dashboard.superadmin.sales.home', compact('sales'));
    }


    public function create()
    {
        $products = Sales::join('products', 'sales.product_id', '=', 'products.id')
            ->select('sales.*', 'products.name');
        return view('dashboard.sales.sales.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'branch_id' => 'required',
            'product_id' => 'required',
            'qty' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Sales::create($input);

        return redirect()->route('superadmin.sales')
            ->with('success', 'Sales created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sales  $Sales
     * @return \Illuminate\Http\Response
     */
    public function edit(Sales $sales)
    {
        return view('dashboard.superadmin.sales.edit', compact('sales'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Superadmin  $Superadmin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sales $sales)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $input = $request->all();

        $sales->update($input);

        return redirect()->route('superadmin.sales')
            ->with('success', 'Sales updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sales  $Sales
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sales $sales)
    {
        $sales->delete();

        return redirect()->route('sales')
            ->with('success', 'Sales deleted successfully');
    }
}
