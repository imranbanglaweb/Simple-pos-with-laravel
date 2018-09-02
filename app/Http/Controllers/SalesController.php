<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DataTables;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // For datatable
     public function datatable()
    {
        return view('Admin.Sales.index');
    }


    public function index()
    {   

        $sales = DB::table('tbl_sales')
                ->join('tbl_customer','tbl_sales.customer_id',
                    '=','tbl_customer.id')
                ->join('tbl_product','tbl_sales.product_id',
                    '=','tbl_product.id')
                ->select('tbl_sales.*','tbl_product.id','tbl_product.product_image','tbl_product.product_name',
                'tbl_customer.customer_name')
                ->orderBy('tbl_sales.id','desc')
                ->get();
                return view('Admin.Sales.index')
                        ->with(compact('sales'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
       $customers = DB::table('tbl_customer')
                    ->get();
       $items = DB::table('tbl_product')
                    ->get();             
                
       return view('Admin.Sales.create')
                ->with('customers',$customers)
                ->with('items',$items);
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
        'sale_no' => 'required|max:255',
        'sale_qty' => 'required',
        'sale_unit_price' => 'required',
        'product_id' => 'required',
        'customer_id' => 'required',
        'sale_note' => 'required',
        'sale_date' => 'required',
    ]);
    $data = array();
    $data['sale_no'] = $request->sale_no;
    $data['sale_qty'] = $request->sale_qty;
    $data['sale_unit_price'] = $request->sale_unit_price;
$data['product_id'] = $request->product_id;
$data['customer_id'] = $request->customer_id;
    $data['sale_note'] = $request->sale_note;
    $data['sale_date'] = $request->sale_date;
    $notification = array(
            'message' => 'Sale Added Successfully.', 
            'alert-type' => 'success'
            );
    DB::table('tbl_sales')
            ->insert($data);
            return redirect('sale/create')
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
        $salesByid = DB::table('tbl_sales')
                ->where('id',$id)
                ->first();
        $customers = DB::table('tbl_customer')
                    ->get();
        $items = DB::table('tbl_product')
                    ->get(); 

        return view('Admin.Sales.edit')
                ->with(compact('salesByid'))
                ->with(compact('customers'))
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
        'sale_no' => 'required|max:255',
        'sale_qty' => 'required',
        'sale_unit_price' => 'required',
        'product_id' => 'required',
        'customer_id' => 'required',
        'sale_note' => 'required',
        'sale_date' => 'required',
    ]);
    $data = array();
    $data['sale_no'] = $request->sale_no;
    $data['sale_qty'] = $request->sale_qty;
    $data['sale_unit_price'] = $request->sale_unit_price;
    $data['product_id'] = $request->product_id;
    $data['customer_id'] = $request->customer_id;
    $data['sale_note'] = $request->sale_note;
    $data['sale_date'] = $request->sale_date;
    // return dd($data);
    // exit();
    $notification = array(
            'message' => 'Sale Updated Successfully.', 
            'alert-type' => 'success'
            );
    DB::table('tbl_sales')
            ->where('id',$id)
            ->update($data);
            return redirect('sale')
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
         DB::table('tbl_sales')
        ->where('id', $id)
        ->delete();
         $notification = array(
            'message' => 'Sale Deleted Successfully.', 
            'alert-type' => 'warning'
            );
        return redirect('sale')
                ->with($notification);
    }
}
