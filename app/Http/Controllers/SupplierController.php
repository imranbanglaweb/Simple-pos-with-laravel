<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = DB::table('tbl_suppliers')
                    ->get();
        return view('Admin.Supplier.index')
                    ->with('suppliers',$suppliers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Supplier.create');
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
        's_code' => 'required|max:255',
        's_name' => 'required',
        's_address' => 'required',
        's_c_person' => 'required',
        's_phone' => 'required',
        's_status' => 'required',
    ]);
    $data = array();
    $data['supplier_code'] = $request->s_code;
    $data['supplier_name'] = $request->s_name;
    $data['supplier_address'] = $request->s_address;
$data['supplier_contact_person'] = $request->s_c_person;
$data['supplier_phone'] = $request->s_phone;
    $data['supplier_status'] = $request->s_status;
    // return dd($data);
    // exit();
    $notification = array(
            'message' => 'Supplier Added Successfully.', 
            'alert-type' => 'success'
            );
    DB::table('tbl_suppliers')
            ->insert($data);
            return redirect('supplier/create')
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
    public function SupplierPublished($id){
        $data = array();
        $data['supplier_status'] =0; 
        DB::table('tbl_suppliers')
         ->where('id', $id)
        ->update($data);
         $notification = array(
            'message' => 'Supplier Inactive Successfully.', 
            'alert-type' => 'warning'
            );
        return redirect('/supplier')
                ->with($notification);
    }
    public function SupplierUnPublished($id){

        $data = array();
        $data['supplier_status'] =1; 

        DB::table('tbl_suppliers')
        ->where('id', $id)
        ->update($data);
         $notification = array(
            'message' => 'Supplier Active Successfully.', 
            'alert-type' => 'info'
            );
        return redirect('/supplier')
                ->with($notification);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  

        $suppByid = DB::table('tbl_suppliers')
                ->where('id',$id)
                ->first();
        return view('Admin.Supplier.edit')
                ->with(compact('suppByid'));
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
        's_code' => 'required|max:255',
        's_name' => 'required',
        's_address' => 'required',
        's_c_person' => 'required',
        's_phone' => 'required',
    ]);
    $data = array();
    $data['supplier_code'] = $request->s_code;
    $data['supplier_name'] = $request->s_name;
    $data['supplier_address'] = $request->s_address;
    $data['supplier_contact_person'] = $request->s_c_person;
    $data['supplier_phone'] = $request->s_phone;
    // return dd($data);
    // exit();
    $notification = array(
            'message' => 'Supplier Updated Successfully.', 
            'alert-type' => 'success'
            );
    DB::table('tbl_suppliers')
            ->where('id',$id)
            ->update($data);
            return redirect('supplier')
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
         DB::table('tbl_suppliers')
        ->where('id', $id)
        ->delete();
         $notification = array(
            'message' => 'Supplier Deleted Successfully.', 
            'alert-type' => 'warning'
            );
        return redirect('supplier')
                ->with($notification);
    }
}
