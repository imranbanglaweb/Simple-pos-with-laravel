@extends('Admin.master')
@section('main_content')

<div class="row blank-page">
<div class="card">
<div class="card-block">
<ol>Dashboard / Purchase</ol>
</div>

<br>

<div class="row match-height tex-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-round-controls">Add Purchase</h4>
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

             <form class="form-horizontal" method="POST" action="{{ route('purchase.update', $purchaseByid->id) }}">
          <input type="hidden" name="_token" value="{{ Session::token() }}">
              {{ method_field('PUT') }}
                        {{ csrf_field() }}
            <div class="form-body">

                <div class="form-group{{ $errors->has('purchase_no') ? ' has-error' : '' }}">
                    <label for="sale_no">
                        Purchase No 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="purchase_no" class="form-control round" value="{{$purchaseByid->purchase_no}}" name="purchase_no">
   
                </div>

                <div class="form-group">
                    <label for="complaintinput2">
                        Select Item
                         <span class=" text-danger">*
                         </span>
                    </label>
                  
                    <select name="product_id" class="form-control round" id="product_id">
        <option>Select Item</option>
            @foreach ($items as $item)
             @if ($purchaseByid->id == $item->id)
                      <option value="{{$item->id}}" selected="">
                        {{$item->product_name}}
                     </option>
            @else
                <option value="{{$item->id}}">
                    {{$item->product_name}}
                </option>
            @endif
            @endforeach
                    </select>
                </div>


                <div class="form-group">
                    <label for="purchase_qty">
                     Quantity <span class=" text-danger">*</span></label>
                    <input type="text" id="purchase_qty" class="form-control round" name="purchase_qty" value="{{$purchaseByid->purchase_qty}}">
                </div>


                <div class="form-group">
                    <label for="p_p_unit">
                    Price Per Unit</label>
               
                     <input type="text" id="p_p_unit" class="form-control round" value="{{$purchaseByid->purchase_price_unit}}" name="p_p_unit">
                </div>

                <div class="form-group">
                    <label for="p_date">
                    Purchase Date</label>
               
                    <input type="date" id="p_date" class="form-control round"  Price" name="p_date" value="{{$purchaseByid->created_at}}">
                </div>


                <div class="form-group">
                    <label for="customer_id">Select Supplier <span class=" text-danger">*</span></label>
            <select name="supplier_id" class="form-control round" id="customer_id">
            @foreach ($suppliers as $supplier)
            @if ($purchaseByid->id == $supplier->id)
                  <option value="{{$supplier->id}}" selected="" style="color: blue">
                    {{$supplier->supplier_name}}
                    </option>
            @else
                <option value="{{$supplier->id}}">
                    {{$supplier->supplier_name}}
                </option>
            @endif
      
            @endforeach
                    
                    </select>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <a href="{{ route('purchase.index') }}">
                    Back To Purchase List</a>
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="icon-check2"></i> Update Purchase
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