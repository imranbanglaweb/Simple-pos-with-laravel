<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    public function index(){
    	
    	$content = view('Admin.Home.index');
    	return view('Admin.master')
    			->with('main_content',$content);
    }
    public function Userlist(){
        $users = DB::table('users')
            ->get();
        return view('Admin.Users.index')
                ->with('users',$users);
    }
    public function Usercreate(){

    	return view('Admin.Users.create');
    }
      public function UserStore(Request $request)
    {
       $request->validate([
         'name' => 'required|string|max:255',
         'email' => 'required|string|email|max:255|unique:users',
         'password' => 'required|string|min:6|confirmed',
        ]);

         $data = array();
$userImage=$request->file('image');
$name=$userImage->getClientOriginalName();
$UploadPath ='public/Admin/CustomerImage/';
$userImage->move($UploadPath,$name);
$imageUrl =$UploadPath.$name;
$password= $request->password;
$passwords= bcrypt($password);

$data['name'] = $request->name;
$data['email'] = $request->email;
$data['password'] = $passwords;
$data['address'] = $request->address;
$data['cell'] = $request->cell;
$data['urole'] = $request->urole;
$data['image'] = $imageUrl;

// return dd($data);
// exit();
  $notification = array(
            'message' => 'User Added Successfully.', 
            'alert-type' => 'success'
            );
    DB::table('users')
    ->insert($data);
    return redirect('user/create')
    ->with($notification);

    }
      public function UserEdit($id){

        // $id=$request->id;
           $userByid = DB::table('users')
           ->where('id',$id)
           ->first();
        return view('Admin.Users.edit')
                ->with('userByid',$userByid);
      }


      public function UserUpdate(Request $request){
        $id=$request->id;
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['address'] = $request->address;
        $data['cell'] = $request->cell;
        $data['urole'] = $request->urole;
        $userImage=$request->file('image');

        if ($userImage) {
        $name=$userImage->getClientOriginalName();
        $UploadPath ='public/Admin/CustomerImage/';
        // $userImage->move($UploadPath,$name);
        $imageUrl =$UploadPath.$name;
        $success = $userImage->move($UploadPath,$name);

    if ($success) {

        $data['image'] = $imageUrl;
          DB::table('users')
            ->where('id',$id)
            ->update($data);
        @unlink(asset($request->old_img_path));
             $notification = array(
            'message' => 'User Updated Successfully.', 
            'alert-type' => 'success'
            );
            return redirect('/user')
                ->with($notification);
    }

        }
        else{
          // dd($data);
          //   exit();
  
             DB::table('users')
            ->where('id',$id)
            ->update($data);

             $notification = array(
            'message' => 'User Updated Successfully.', 
            'alert-type' => 'success'
            );
           return redirect('/user')
                ->with($notification);

        }

      }

      public function UserDelete($id){
          DB::table('users')
            ->where('id',$id)
            ->delete();
             $notification = array(
            'message' => 'User Deleted Successfully.', 
            'alert-type' => 'warning'
            );
           return redirect('/user')
                ->with($notification);
      }


}
