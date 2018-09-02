<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Response;
use Illuminate\Support\Facades\Input;
use json;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
  

        $employees= DB::table('tbl_employee')
                    ->get();
        return view('Admin.Hr.Employee.index')
                ->with('employees',$employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('Admin.Hr.Employee.create');
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
        'employee_name' => 'required|max:255',
        'father_name' => 'required',
        'mother_name' => 'required',
        'present_address' => 'required',
        'parmanent_address' => 'required',
        'designation' => 'required',
        'department' => 'required',
        'mobile_number' => 'required',
        'email' => 'required',
    ]);
    $data = array();
    $data['employee_name'] = $request->employee_name;
    $data['mother_name'] = $request->mother_name;
    $data['father_name'] = $request->father_name;
    $data['present_address'] = $request->present_address;
$data['parmanent_address'] = $request->parmanent_address;
    $data['designation'] = $request->designation;
   
    $data['department'] = $request->department;
    $data['mobile_number'] = $request->mobile_number;
    $data['email'] = $request->email;
    $data['created_at'] = $request->date;

     DB::table('tbl_employee')
            ->insert($data);
     return redirect('/employee');

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
        $employee_det_id = DB::table('tbl_employee')
                            ->where('id',$did)
                            ->first();
    return view('Admin.Hr.Employee.view')
        ->with('employee_det_id',$employee_det_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {

    //      $employee = DB::table('tbl_employee')
    //                 ->where('id',$id)
    //                 ->get();
    //     return response()->json($employee);
    // }

    public function employeeGet($id)
    {    

         $employeeByid = DB::table('tbl_employee')
                ->where('id',$id)
                ->first();
        return view('Admin.Hr.Employee.edit')
                ->with(compact('employeeByid'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // edit data function
        $data = array();
        $id = $request->id;
        $data['employee_name'] = $request->employee_name;
        $data['father_name'] = $request->father_name;
        $data['mother_name'] = $request->mother_name;
        $data['present_address'] = $request->present_address;
        $data['designation'] = $request->designation;
$data['parmanent_address'] = $request->parmanent_address;
        $data['department'] = $request->department;
$data['mobile_number'] = $request->mobile_number;
        $data['email'] = $request->email;
        $data['created_at'] = $request->created_at;

        $notification = array(
            'message' => 'Employee Updated Successfully.', 
            'alert-type' => 'success'
            );
         DB::table('tbl_employee')
                ->where('id',$id)
                ->update($data);
     return redirect('/employee')
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
            $employee = DB::table('tbl_employee')
                ->where('id',$id)
                ->delete();

        $notification = array(
            'message' => 'Employee Deleted Successfully.', 
            'alert-type' => 'warning'
            );
        return redirect('/employee')
            ->with($notification);
    }
}
