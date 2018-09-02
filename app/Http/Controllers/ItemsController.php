<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    $items = DB::table('tbl_product')
                    ->orderBy('id','desc')
                    ->get();
         return view('Admin.Products.index')
                ->with('items',$items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //       $request->validate([
    //     'product_code' => 'required|max:255',
    //     'product_name' => 'required|max:255',
    //     'product_dis' => 'required|max:255',
    //     'product_price' => 'required|max:255',
    // 'product__order_level' => 'required|max:255',
    //     'product_status' => 'required',
    //     'product_image' => 'required',
    //     ]);
          $data = array();
$productImage=$request->file('product_image');
$name=$productImage->getClientOriginalName();
$UploadPath ='public/Admin/ItemImage/';
$productImage->move($UploadPath,$name);
$imageUrl =$UploadPath.$name;


$data['product_code'] = $request->product_code;
$data['product_name'] = $request->product_name;
$data['product_dis'] = $request->product_dis;
$data['product_price'] = $request->product_price;
$data['product_order_level'] = $request->product_order_level;
$data['product_status'] = $request->product_status;
$data['product_image'] = $imageUrl;
// return dd($data);
// exit();
  $notification = array(
            'message' => 'Item Added Successfully.', 
            'alert-type' => 'success'
            );
    DB::table('tbl_product')
    ->insert($data);
    return redirect('item/create')
    ->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ItemPublishedStatus($id){
        $data = array();
        $data['product_status'] =0; 
        DB::table('tbl_product')
         ->where('id', $id)
        ->update($data);
         $notification = array(
            'message' => 'Item UnPublished Successfully.', 
            'alert-type' => 'warning'
            );
        return redirect('/item')
                ->with($notification);
    }
    public function ItemUnPublishedStatus($id){

        $data = array();
        $data['product_status'] =1; 

        DB::table('tbl_product')
        ->where('id', $id)
        ->update($data);
         $notification = array(
            'message' => 'Item Published Successfully.', 
            'alert-type' => 'info'
            );
        return redirect('/item')
                ->with($notification);
    }
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
        $productByid = DB::table('tbl_product')
                ->where('id',$id)
                ->first();
        return view('Admin.Products.edit')
                ->with(compact('productByid'));
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
        $data['product_code'] = $request->product_code;
        $data['product_name'] = $request->product_name;
        $data['product_dis'] = $request->product_dis;
        $data['product_price'] = $request->product_price;
    $data['product_order_level'] = $request->product_order_level;

        $itemImage=$request->file('product_image');

        if ($itemImage) {
        $name=$itemImage->getClientOriginalName();
        $UploadPath ='public/Admin/ItemImage/';
        $imageUrl =$UploadPath.$name;
        $success = $itemImage->move($UploadPath,$name);

    if ($success) {

        $data['product_image'] = $imageUrl;
          DB::table('tbl_product')
            ->where('id',$id)
            ->update($data);
        @unlink(asset($request->old_img_path));
             $notification = array(
            'message' => 'Item Updated Successfully.', 
            'alert-type' => 'success'
            );
            return redirect('/item')
                ->with($notification);
    }

        }
        else{
          // dd($data);
          //   exit();
  
             DB::table('tbl_product')
            ->where('id',$id)
            ->update($data);

             $notification = array(
            'message' => 'Item Updated Successfully.', 
            'alert-type' => 'success'
            );
           return redirect('/item')
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

        DB::table('tbl_product')
        ->where('id', $id)
        ->delete();
         $notification = array(
            'message' => 'Item Deleted Successfully.', 
            'alert-type' => 'warning'
            );
        return redirect('item')
                ->with($notification);
    }
}
