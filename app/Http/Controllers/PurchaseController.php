<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $purchases = DB::table('tbl_purchase')
                    ->join('tbl_suppliers','tbl_purchase.supplier_id','=','tbl_suppliers.id')
                    ->join('tbl_product','tbl_purchase.product_id','=','tbl_product.id')
                    ->select('tbl_purchase.*','tbl_suppliers.supplier_name','tbl_product.product_name','tbl_product.product_image')
                    ->orderBy('tbl_purchase.id','desc')
                    ->get();
        return view('Admin.Purchase.index')
                ->with('purchases',$purchases);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = DB::table('tbl_suppliers')
                    ->get();
       $items = DB::table('tbl_product')
                    ->get();  
         return view('Admin.Purchase.create')
                ->with('suppliers',$suppliers)
                ->with('items',$items);;
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
        'purchase_no' => 'required|max:255',
        'product_id' => 'required',
        'purchase_qty' => 'required',
        'p_p_unit' => 'required',
        'supplier_id' => 'required',
        'p_date' => 'required',
    ]);
    $data = array();
    $data['purchase_no'] = $request->purchase_no;
    $data['product_id'] = $request->product_id;
    $data['supplier_id'] = $request->supplier_id;
    $data['purchase_qty'] = $request->purchase_qty;
    $data['purchase_price_unit'] = $request->p_p_unit;
    $data['created_at'] = $request->p_date;
    // return dd($data);
    $notification = array(
            'message' => 'Purchase Added Successfully.', 
            'alert-type' => 'success'
            );
    DB::table('tbl_purchase')
            ->insert($data);
            return redirect('purchase/create')
            ->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $purchaseByid = DB::table('tbl_purchase')
                ->where('id',$id)
                ->first();
        $suppliers = DB::table('tbl_suppliers')
                    ->get();
        $items = DB::table('tbl_product')
                    ->get(); 

        return view('Admin.Purchase.edit')
                ->with(compact('purchaseByid'))
                ->with(compact('suppliers'))
                ->with(compact('items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
        'purchase_no' => 'required|max:255',
        'product_id' => 'required',
        'purchase_qty' => 'required',
        'p_p_unit' => 'required',
        'supplier_id' => 'required',
        'p_date' => 'required',
    ]);
    $data = array();
    $data['purchase_no'] = $request->purchase_no;
    $data['product_id'] = $request->product_id;
    $data['supplier_id'] = $request->supplier_id;
    $data['purchase_qty'] = $request->purchase_qty;
    $data['purchase_price_unit'] = $request->p_p_unit;
    $data['created_at'] = $request->p_date;
    // return dd($data);
    // exit();
    $notification = array(
            'message' => 'Purchase Updated Successfully.', 
            'alert-type' => 'success'
            );
    DB::table('tbl_purchase')
            ->where('id',$id)
            ->update($data);
            return redirect('purchase')
            ->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          DB::table('tbl_purchase')
        ->where('id', $id)
        ->delete();
         $notification = array(
            'message' => 'Purchase Deleted Successfully.', 
            'alert-type' => 'warning'
            );
        return redirect('purchase')
                ->with($notification);
    }
}
