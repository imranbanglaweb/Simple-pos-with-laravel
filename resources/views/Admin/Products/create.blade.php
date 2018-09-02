@extends('Admin.master')
@section('main_content')

<div class="row blank-page">
<div class="card">
<div class="card-block">
<ol>Dashboard / Item</ol>
</div>


<div class="row match-height tex-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-round-controls">
                Add Item</h4>
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

        <form class="form-horizontal" method="POST" action="{{ route('item.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
            <div class="form-body">

                <div class="form-group{{ $errors->has('product_code') ? ' has-error' : '' }}">
                    <label for="product_code">Item Code 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="sale_no" class="form-control round" {{ old('product_code') }}  name="product_code" placeholder="1002">
                     @if ($errors->has('product_code'))
                    <span class="help-block">
                        <strong>{{ $errors->first('product_code') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('product_name') ? ' has-error' : '' }}">
                    <label for="product_name">Item Name 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="product_name" class="form-control round" {{ old('product_name') }} placeholder="Enter Item name"  name="product_name">
            @if ($errors->has('product_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('product_name') }}</strong>
                </span>
            @endif
                </div>
                <div class="form-group{{ $errors->has('product_dis') ? ' has-error' : '' }}">
                    <label for="product_dis">Item Discription 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="sale_no" class="form-control round" {{ old('product_dis') }} placeholder="Enter Item  Discription" name="product_dis">
            @if ($errors->has('product_dis'))
                <span class="help-block">
                    <strong>{{ $errors->first('product_dis') }}</strong>
                </span>
            @endif
                </div>
                <div class="form-group{{ $errors->has('product_price') ? ' has-error' : '' }}">
                    <label for="product_price">Item Min Sale Price 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="product_price" class="form-control round" {{ old('product_price') }} placeholder="Enter Item Price" name="product_price">
            @if ($errors->has('product_price'))
                <span class="help-block">
                    <strong>{{ $errors->first('product_price') }}</strong>
                </span>
            @endif
                </div>

                <div class="form-group{{ $errors->has('product_order_level') ? ' has-error' : '' }}">
                    <label for="product_order_level">
                    Item Order Level<span class=" text-danger">*</span></label>
                    <input type="text" id="product_order_level" class="form-control round" placeholder="Enter Item Order Level" name="product_order_level">
     @if ($errors->has('product_order_level'))
                <span class="help-block">
                    <strong>
        {{ $errors->first('product_order_level') }}
                    </strong>
                </span>
            @endif
                </div>


                <div class="form-group{{ $errors->has(' product_status') ? ' has-error' : '' }}">
                    <label for="status">Select Status <span class=" text-danger">*</span></label>
                    <select name="product_status" class="form-control round" id="status">
                    <option>Select Item status
                    </option>
                    <option value="1">
                    Active
                    </option>
                    <option value="0">
                    Inactive
                    </option>
                    </select>
                    @if ($errors->has(' product_status'))
                <span class="help-block">
                    <strong>
                {{ $errors->first(' product_status') }}
                            </strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="product_image">Select Item Image <span class=" text-danger">*</span></label>
                    <input type="file" name="product_image" class="form-control">
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