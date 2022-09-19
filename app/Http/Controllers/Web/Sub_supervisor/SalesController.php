<?php

namespace App\Http\Controllers\Web\Sub_supervisor;

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
        $sales = Sales::join('branches', 'sales.branch_id', '=', 'branches.id')
            ->join('products', 'sales.product_id', '=', 'products.id')
            ->select('sales.*', 'products.name', 'branches.branch')
            ->where('sales.branch_id', '=', Auth::user()->branch_id)
            ->where('sales.status', '!=', 'ditolak')
            ->where('sales.status', '!=', 'disetujui')
            ->get();
        // dd($sales);
        return view('dashboard.sub_supervisor.sales.home', compact('sales'));
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

        return redirect()->route('sales.sales')
            ->with('success', 'Sales created successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sales  $Sales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sales $sales)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $input = $request->all();

        $sales->update($input);

        return redirect()->route('sub_supervisor.sales')
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
