<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SittingController extends Controller
{
	public function Edit()
    {
    $changeid = DB::table('tbl_sittings')
    ->where('id',1)
    ->first();
    return view('Admin.Sittings.sitting')
    ->with(compact('changeid'));
    }

    public function Update(Request $request)
    {
     $request->validate([
        'theme_title' => 'required|max:255',
        'theme_dis' => 'required',
        'theme_color' => 'required',
    ]);
    $data = array();
    $data['theme_title'] = $request->theme_title;
    $data['theme_dis'] = $request->theme_dis;
	$data['theme_color'] = $request->theme_color;

    $themeImage=$request->file('theme_logo');

        if ($themeImage) {
        $name=$themeImage->getClientOriginalName();
        $UploadPath ='public/Admin/ItemImage/';
        $imageUrl =$UploadPath.$name;
        $success = $themeImage->move($UploadPath,$name);

    if ($success) {

        $data['theme_logo'] = $imageUrl;
          DB::table('tbl_sittings')
          	// ->where('id',1)
            ->insert($data);

        @unlink(asset($request->old_img_path));
             $notification = array(
            'message' => 'Sitting Update Successfully.', 
            'alert-type' => 'success'
            );
            return redirect('general')
                ->with($notification);
    }

        }
        else{
          // dd($data);
          //   exit();
  
             DB::table('tbl_sittings')
            // ->where('id',1)
            ->update($data);
             $notification = array(
            'message' => 'Sitting Update Successfully.', 
            'alert-type' => 'success'
            );
           return redirect('general')
                ->with($notification);

        }
    }
}
