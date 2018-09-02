@extends('Admin.master')
@section('main_content')

<div class="row blank-page">
<div class="card">
<div class="card-block">
<ol>Dashboard / Edit Supplier</ol>
</div>


<div class="row match-height tex-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-round-controls">
                Edit Supplier</h4>
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

          <form class="form-horizontal" method="POST" action="{{ route('supplier.update', $suppByid->id) }}">
          <input type="hidden" name="_token" value="{{ Session::token() }}">
              {{ method_field('PUT') }}
                        {{ csrf_field() }}
            <div class="form-body">

                <div class="form-group{{ $errors->has('s_code') ? ' has-error' : '' }}">
                    <label for="s_code">Supplier Code 
                    <span class=" text-danger">*</span>
                    </label>
            <input type="text" id="s_code" class="form-control round"  name="s_code" value="{{$suppByid->supplier_code}}">

                </div>

                <div class="form-group{{ $errors->has('s_name') ? ' has-error' : '' }}">
                    <label for="s_name">Supplier Name 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="s_name" class="form-control round" value="{{$suppByid->supplier_name}}"  name="s_name">
            @if ($errors->has('s_name'))
        <span class="help-block">
            <strong>{{ $errors->first('s_name') }}</strong>
        </span>
            @endif
                </div>
                <div class="form-group{{ $errors->has('s_address') ? ' has-error' : '' }}">
                    <label for="s_address">Address 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="sale_no" class="form-control round" value="{{$suppByid->supplier_address}}" name="s_address">
            @if ($errors->has('s_address'))
                <span class="help-block">
                    <strong>{{ $errors->first('s_address') }}</strong>
                </span>
            @endif
                </div>
                <div class="form-group{{ $errors->has('s_c_person') ? ' has-error' : '' }}">
                    <label for="s_c_person">Contact Person 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="s_c_person" class="form-control round" value="{{$suppByid->supplier_contact_person}}" name="s_c_person">
            @if ($errors->has('s_c_person'))
                <span class="help-block">
                    <strong>{{ $errors->first('s_c_person') }}</strong>
                </span>
            @endif
                </div>

                <div class="form-group{{ $errors->has('s_phone') ? ' has-error' : '' }}">
                    <label for="product_order_level">
                    Phone No<span class=" text-danger">*</span></label>
                    <input type="text" id="s_phone" class="form-control round"  value="{{$suppByid->supplier_phone}}" name="s_phone">
     @if ($errors->has('s_phone'))
                <span class="help-block">
                    <strong>
        {{ $errors->first('s_phone') }}
                    </strong>
                </span>
            @endif
                </div>


                <div class="form-group{{ $errors->has(' s_status') ? ' has-error' : '' }}">
                    <label for="supplier_status">Select Status <span class=" text-danger">*</span></label>
                   <select name="supplier_status" class="form-control round" id="status" value="{{$suppByid->id }}">
                    @if ($suppByid->supplier_status == 1)
                    <option value="{{$suppByid->supplier_status}}" selected="selected" disabled="">
                    Active
                    </option>
                    @else
                    <option value="{{$suppByid->supplier_status}}" selected="selected" disabled="">
                    Inactive
                    </option>
                    @endif
               
                   
                    </select>
                    @if ($errors->has(' s_status'))
                <span class="help-block">
                    <strong>
            {{ $errors->first(' s_status') }}
                            </strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-actions">
                 <button type="button" class="btn btn-warning mr-1"> 
                    <a href="{{ route('supplier.index') }}">Back To Supplier List</a>
            </button>
                <button type="submit" class="btn btn-primary">
                    <i class="icon-check2"></i> Update Supplier
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