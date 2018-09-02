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
                <h4 class="card-title" id="basic-layout-round-controls">Edit Customer</h4>
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

        <form class="form-horizontal" method="POST" action="{{ route('customer.update', $customerByid->id) }}" name="edit_customer" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ Session::token() }}">
              {{ method_field('PUT') }}
                        {{ csrf_field() }}
            <div class="form-body">

                <div class="form-group{{ $errors->has('customer_code') ? ' has-error' : '' }}">
                    <label for="customer_code">Customer Code 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="sale_no" class="form-control round"  name="customer_code" value="{{$customerByid->customer_code}}">
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
                    <input type="text" id="sale_no" class="form-control round" value="{{$customerByid->customer_name}}"  name="customer_name">
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
                    <input type="text" id="sale_no" class="form-control round"  value="{{$customerByid->customer_address}}"  name="customer_address">
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
                    <input type="text" id="customer_mobile" class="form-control round" value="{{$customerByid->customer_mobile}}"  name="customer_mobile">
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
                  
                    <select name="country" class="form-control round" id="country" value="{{$customerByid->country }}">
                        @if ($customerByid->country)
            <option value="{{$customerByid->country }}" selected="selected">
                {{$customerByid->country }}
            </option>


                <option value="Australia">
                    Australia
                </option>
                <option value="Amarica">
                    Amarica
                </option>
                <option value="England">
                    England
                </option>
                <option value="Bangladesh">
                    Bangladesh
                </option>

                    </select>
                </div>
                @endif
                <div class="form-group{{ $errors->has('customer_email') ? ' has-error' : '' }}">
                    <label for="customer_email">
                    Customer Email <span class=" text-danger">*</span></label>
                    <input type="email" id="customer_email" class="form-control round" value="{{$customerByid->customer_email}}" name="customer_email">
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
                    <select name="status" class="form-control round" id="status" value="{{$customerByid->id }}">
                    @if ($customerByid->status == 1)
                    <option value="{{$customerByid->status}}" selected="selected" disabled="">
                    Active
                    </option>
                    @else
                    <option value="{{$customerByid->status}}" selected="selected" disabled="">
                    Inactive
                    </option>
                    @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="customer_image">Select Customer Image <span class=" text-danger">*</span></label>
                    <input type="file" name="customer_image" class="form-control">
                    <input type="hidden" name="old_img_path" value="{{$customerByid->customer_image}}">
                    <img src="{{ asset('$customerByid->customer_image') }}" width="80" height="80">
                </div>
            </div>

            <div class="form-actions">
                  <button type="button" class="btn btn-warning mr-1"> 
                    <a href="{{ route('customer.index') }}">Back To Customer List</a>
            </button>
                <button type="submit" class="btn btn-primary">
                    <i class="icon-check2"></i> Update Customer
                </button>
            </div>
        </form>
    <script>
    document.forms['edit_customer'].elements['country'].value=<?php echo $customerByid->country ; ?>

    // document.getElementById('personlist').getElementsByTagName('option')[11].selected = 'selected'
    </script>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>



@endsection