@extends('Admin.master')
@section('main_content')

<div class="row blank-page">
<div class="card">
<div class="card-block">
<ol>Dashboard / Add Employee</ol>
</div>


<div class="row match-height tex-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-round-controls">
                Add Employee</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                        <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                        <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body collapse in">
                <div class="card-block">

        <form class="form-horizontal" method="POST" action="{{ url('employee/update') }}">
                        {{ csrf_field() }}
            <div class="form-body">

                <div class="form-group{{ $errors->has('em_name') ? ' has-error' : '' }}">
                    <label for="em_name">Employee Name 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="em_name" class="form-control round"  name="employee_name" value="{{$employeeByid->employee_name}}">

                    <input type="hidden"  name="id" value="{{$employeeByid->id}}">
         
                </div>

                <div class="form-group{{ $errors->has('f_name') ? ' has-error' : '' }}">
                    <label for="f_name">Fathers Name 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="f_name" class="form-control round" value="{{$employeeByid->father_name}}"  name="father_name">
            @if ($errors->has('f_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('f_name') }}</strong>
                </span>
            @endif
                </div>
                <div class="form-group{{ $errors->has('mother_name') ? ' has-error' : '' }}">
                    <label for="mother_name">Mothers Name 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="mother_name" class="form-control round" value="{{$employeeByid->mother_name}}" name="mother_name">
                </div>
                <div class="form-group{{ $errors->has('present_address') ? ' has-error' : '' }}">
                    <label for="present_address">Present Address
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="present_address" class="form-control round" value="{{$employeeByid->present_address}}" name="present_address">
                </div>

                <div class="form-group{{ $errors->has('parmanent_address') ? ' has-error' : '' }}">
                    <label for="parmanent_address">
                    Permanent Address<span class=" text-danger">*</span></label>
                    <input type="text" id="parmanent_address" class="form-control round" value="{{$employeeByid->parmanent_address}}" name="parmanent_address">
                </div>


                <div class="form-group{{ $errors->has(' e_designation') ? ' has-error' : '' }}">
                    <label for="e_designation">
                     Employee Designation <span class=" text-danger">*</span></label>
                     <input type="text" id="e_designation" class="form-control round" value="{{$employeeByid->designation}}" name="designation" class="form-control round">
                </div>
                <div class="form-group{{ $errors->has(' department') ? ' has-error' : '' }}">
                    <label for="department">Department<span class=" text-danger">*</span></label>
                    <input type="text" name="department" class="form-control" value="{{$employeeByid->department}}">
                </div>
                <div class="form-group{{ $errors->has(' mobile') ? ' has-error' : '' }}">
            <label for="mobile">Mobile Number<span class=" text-danger">*</span></label>
            <input type="number" name="mobile_number" class="form-control" value="{{$employeeByid->mobile_number}}">
          
                </div>
                <div class="form-group{{ $errors->has(' email') ? ' has-error' : '' }}">
                <label for="email">Email<span class=" text-danger">*</span></label>
                <input type="email" name="email" class="form-control" value="{{$employeeByid->email}}">
           
                </div>
                <div class="form-group{{ $errors->has(' joining_date') ? ' has-error' : '' }}">
                <label for="date">Date Of Join<span class=" text-danger">*</span></label>
                <input type="date" name="created_at" class="form-control">
                    @if ($errors->has('created_at'))
                <span class="help-block">
                    <strong>
                {{ $errors->first('created_at') }}
                            </strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <a href="{{ url('employee') }}">
                        Back To Employee List
                    </a>
                    
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="icon-check2"></i> Update Employee
                </button>
            </div>
        </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>



@endsection