@extends('Admin.master')
@section('main_content')

<div class="row blank-page">
<div class="card">
<div class="card-block">
<ol>Dashboard / Customer</ol>
</div>


<div class="row match-height tex-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-round-controls">Add Customer</h4>
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

        <form class="form-horizontal" method="POST" action="{{ route('customer.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
            <div class="form-body">

                <div class="form-group{{ $errors->has('customer_code') ? ' has-error' : '' }}">
                    <label for="customer_code">Customer Code 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="sale_no" class="form-control round" {{ old('customer_code') }}  name="customer_code" placeholder="1002">
                     @if ($errors->has('customer_code'))
                    <span class="help-block">
                        <strong>{{ $errors->first('customer_code') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('customer_name') ? ' has-error' : '' }}">
                    <label for="sale_no">Customer Name 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="sale_no" class="form-control round" {{ old('customer_name') }} placeholder="Enter Customer name"  name="customer_name">
            @if ($errors->has('customer_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('customer_name') }}</strong>
                </span>
            @endif
                </div>
                <div class="form-group{{ $errors->has('customer_address') ? ' has-error' : '' }}">
                    <label for="customer_address">Customer Address 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="sale_no" class="form-control round" {{ old('customer_address') }} placeholder="Enter Customer Address"  name="customer_address">
            @if ($errors->has('customer_address'))
                <span class="help-block">
                    <strong>{{ $errors->first('customer_address') }}</strong>
                </span>
            @endif
                </div>
                <div class="form-group{{ $errors->has('customer_mobile') ? ' has-error' : '' }}">
                    <label for="customer_mobile">Customer Mobile 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="customer_mobile" class="form-control round" {{ old('customer_mobile') }} placeholder="Enter Customer Mobile"  name="customer_mobile">
            @if ($errors->has('customer_mobile'))
                <span class="help-block">
                    <strong>{{ $errors->first('customer_mobile') }}</strong>
                </span>
            @endif
                </div>

                <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                    <label for="country">Select Country
                    <span class=" text-danger">*
                    </span>
                    </label>
                  
                    <select name="country" class="form-control round" id="country">
                <option value="bn">
                    Bangladesh
                </option>
                <option value="an">
                    Australia
                </option>
                <option value="usa">
                    Amarica
                </option>
                <option value="en">
                    England
                </option>

                    </select>
                      @if ($errors->has('country'))
                <span class="help-block">
                    <strong>{{ $errors->first('country') }}</strong>
                </span>
            @endif
                </div>


                <div class="form-group{{ $errors->has('customer_email') ? ' has-error' : '' }}">
                    <label for="customer_email">
                    Customer Email <span class=" text-danger">*</span></label>
                    <input type="email" id="customer_email" class="form-control round" placeholder="Enter Email address" name="customer_email">
            @if ($errors->has('customer_email'))
                <span class="help-block">
                    <strong>
        {{ $errors->first('customer_email') }}
                    </strong>
                </span>
            @endif
                </div>


                <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                    <label for="status">Select Status <span class=" text-danger">*</span></label>
                    <select name="status" class="form-control round" id="status">
                    <option>Select Customer status
                    </option>
                    <option value="1">
                    Active
                    </option>
                    <option value="0">
                    Inactive
                    </option>
                    </select>
                    @if ($errors->has('status'))
                <span class="help-block">
                    <strong>
                {{ $errors->first('status') }}
                            </strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="customer_image">Select Customer Image <span class=" text-danger">*</span></label>
                    <input type="file" name="customer_image" class="form-control">
                </div>
            </div>

            <div class="form-actions">
            <button type="button" class="btn btn-warning mr-1"> 
                    <a href="{{ route('customer.index') }}">Back To Customer List</a>
            </button>
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