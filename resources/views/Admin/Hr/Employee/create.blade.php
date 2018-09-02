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

        <form class="form-horizontal" method="POST" action="{{ url('employee/store') }}">
                        {{ csrf_field() }}
            <div class="form-body">

                <div class="form-group{{ $errors->has('em_name') ? ' has-error' : '' }}">
                    <label for="employee_name">Employee Name 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="employee_name" class="form-control round" {{ old('employee_name') }}  name="employee_name" placeholder="Enter Employee Name">
                     @if ($errors->has('employee_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('employee_name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('f_name') ? ' has-error' : '' }}">
                    <label for="father_name">Fathers Name 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="f_name" class="form-control round" {{ old('father_name') }} placeholder="Enter Fathers Name"  name="father_name">
            @if ($errors->has('father_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('father_name') }}</strong>
                </span>
            @endif
                </div>
                <div class="form-group{{ $errors->has('mother_name') ? ' has-error' : '' }}">
                    <label for="mother_name">Mothers Name 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="mother_name" class="form-control round" {{ old('mother_name') }} placeholder="Enter Mothers Name" name="mother_name">
            @if ($errors->has('m_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('mother_name') }}</strong>
                </span>
            @endif
                </div>
                <div class="form-group{{ $errors->has('present_address') ? ' has-error' : '' }}">
                    <label for="present_address">Present Address
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="present_address" class="form-control round" {{ old('present_address') }} placeholder="Enter Present Address" name="present_address">
            @if ($errors->has('present_address'))
                <span class="help-block">
                    <strong>{{ $errors->first('present_address') }}</strong>
                </span>
            @endif
                </div>

                <div class="form-group{{ $errors->has('per_address') ? ' has-error' : '' }}">
                    <label for="parmanent_address">
                    Permanent Address<span class=" text-danger">*</span></label>
                    <input type="text" id="parmanent_address" class="form-control round" placeholder="Enter Permanent Address" name="parmanent_address">
     @if ($errors->has('parmanent_address'))
                <span class="help-block">
                    <strong>
        {{ $errors->first('parmanent_address') }}
                    </strong>
                </span>
            @endif
                </div>


                <div class="form-group{{ $errors->has(' designation') ? ' has-error' : '' }}">
                    <label for="designation">
                     Employee Designation <span class=" text-danger">*</span></label>
                     <input type="text" id="designation" class="form-control round" placeholder="Enter Employee Designation" name="designation" class="form-control round">
                    @if ($errors->has('designation'))
                <span class="help-block">
                    <strong>
                {{ $errors->first('designation') }}
                            </strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has(' department') ? ' has-error' : '' }}">
                    <label for="department">Department<span class=" text-danger">*</span></label>
                    <input type="text" name="department" class="form-control" placeholder="Enter Name of the department">
                    @if ($errors->has('department'))
                <span class="help-block">
                    <strong>
                {{ $errors->first('department') }}
                            </strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has(' mobile_number') ? ' has-error' : '' }}">
                <label for="mobile_number">Mobile Number<span class=" text-danger">*</span></label>
                <input type="number" name="mobile_number" class="form-control" placeholder="Enter Mobile Number">
                    @if ($errors->has('mobile_number'))
                <span class="help-block">
                    <strong>
                {{ $errors->first('mobile_number') }}
                            </strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has(' email') ? ' has-error' : '' }}">
                <label for="email">Email<span class=" text-danger">*</span></label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email Address">
                    @if ($errors->has('email'))
                <span class="help-block">
                    <strong>
                {{ $errors->first('email') }}
                            </strong>
                        </span>
                    @endif
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
                    <i class="icon-check2"></i> Add Item
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