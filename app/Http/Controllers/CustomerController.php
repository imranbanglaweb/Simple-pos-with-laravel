<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = DB::table('tbl_customer')
                    ->orderBy('id','desc') 
                    ->get(); 
       return view('Admin.Customers.index')
                ->with('customers',$customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('Admin.Customers.create');
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
        'customer_code' => 'required|max:255',
        'customer_name' => 'required|max:255',
        'customer_address' => 'required|max:255',
        'customer_email' => 'required|max:255',
        'country' => 'required|max:255',
        'status' => 'required',
        'customer_image' => 'required',
        ]);

         $data = array();
$customerImage=$request->file('customer_image');
$name=$customerImage->getClientOriginalName();
$UploadPath ='public/Admin/CustomerImage/';
$customerImage->move($UploadPath,$name);
$imageUrl =$UploadPath.$name;


$data['customer_code'] = $request->customer_code;
$data['customer_name'] = $request->customer_name;
$data['customer_address'] = $request->customer_address;
$data['country'] = $request->country;
$data['customer_email'] = $request->customer_email;
$data['customer_mobile'] = $request->customer_mobile;
$data['customer_image'] = $imageUrl;
$data['status'] = $request->status;
$data['customer_image'] = $imageUrl;
// return dd($data);
// exit();
  $notification = array(
            'message' => 'Customer Added Successfully.', 
            'alert-type' => 'success'
            );
    DB::table('tbl_customer')
    ->insert($data);
    return redirect('customer/create')
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
         $customerByid = DB::table('tbl_customer')
                ->where('id',$id)
                ->first();
        return view('Admin.Customers.edit')
                ->with(compact('customerByid'));
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
         // $id=$request->id;
        $data = array();

        $data['customer_code'] = $request->customer_code;
        $data['customer_name'] = $request->customer_name;
        $data['customer_address'] = $request->customer_address;
        $data['customer_mobile'] = $request->customer_mobile;
        $data['country'] = $request->country;
        $data['customer_email'] = $request->customer_email;
        $customerImage=$request->file('customer_image');

        if ($customerImage) {
        $name=$customerImage->getClientOriginalName();
        $UploadPath ='public/Admin/ItemImage/';
        $imageUrl =$UploadPath.$name;
        $success = $customerImage->move($UploadPath,$name);

    if ($success) {

        $data['customer_image'] = $imageUrl;
          DB::table('tbl_customer')
            ->where('id',$id)
            ->update($data);
        @unlink(asset($request->old_img_path));
             $notification = array(
            'message' => 'Customer Updated Successfully.', 
            'alert-type' => 'success'
            );
            return redirect('/customer')
                ->with($notification);
    }

        }
        else{
          // dd($data);
          //   exit();
  
             DB::table('tbl_customer')
            ->where('id',$id)
            ->update($data);

             $notification = array(
            'message' => 'Customer Updated Successfully.', 
            'alert-type' => 'success'
            );
           return redirect('/customer')
                ->with($notification);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         DB::table('tbl_customer')
        ->where('id', $id)
        ->delete();
         $notification = array(
            'message' => 'Customer Deleted Successfully.', 
            'alert-type' => 'warning'
            );
        return redirect('customer')
                ->with($notification);
    }
}
