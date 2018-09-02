<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class GiftcardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $gifts= DB::table('tbl_gift_card')
                    ->get();
        return view('Admin.Giftcard.index')
                ->with('gifts',$gifts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('Admin.Giftcard.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //    $request->validate([
    //     'card_no' => 'required|max:255',
    //     'value' => 'required',
    // ]);
    $data = array();
    $data['card_no'] = $request->card_no;
    $data['value'] = $request->value;
    $data['created_at'] = $request->expiry_date;

    $employee = DB::table('tbl_gift_card')
            ->insert($data);

     return response()->json($employee);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Details($did)
    {
         // $id= base64_decode($id);
        $giftcard_det_id = DB::table('tbl_gift_card')
                            ->where('id',$did)
                            ->first();
    return view('Admin.Giftcard.view')
        ->with('giftcard_det_id',$giftcard_det_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


         $giftcard = DB::table('tbl_gift_card')
                ->where('id',$id)
                ->first();
        return response()->json($giftcard);
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
         // edit data function
         $data = array();
         $data['card_no'] = $request->card_no;
         $data['value'] = $request->value;
         $data['created_at'] = $request->expiry_date;
     

        $giftcard = DB::table('tbl_gift_card')
                ->where('id',$id)
                ->update($data);
      return response()->json($giftcard);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $giftcard = DB::table('tbl_gift_card')
                ->where('id',$id)
                ->delete();

    return response()->json($giftcard);
    }
}
