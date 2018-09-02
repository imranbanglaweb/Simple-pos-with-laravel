@extends('Admin.master')
@section('main_content')

<div class="row blank-page">
<div class="card">
<div class="card-block">
<ol>Dashboard / Edit Sales</ol>
</div>


<div class="row match-height tex-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-round-controls">Edit Sale</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
             
                    </ul>
                </div>
            </div>
            <div class="card-body collapse in">
                <div class="card-block">

         <form class="form-horizontal" method="POST" action="{{ route('sale.update', $salesByid->id) }}" name="edit_item" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ Session::token() }}">
              {{ method_field('PUT') }}
                        {{ csrf_field() }}
            <div class="form-body">

                <div class="form-group{{ $errors->has('sale_no') ? ' has-error' : '' }}">
                    <label for="sale_no">
                        Sale No 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="sale_no" class="form-control round" value="{{$salesByid->sale_no}}" name="sale_no">
                     @if ($errors->has('sale_no'))
                    <span class="help-block">
                            <strong>{{ $errors->first('sale_no') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="complaintinput2">
                        Select Item
                         <span class=" text-danger">*
                         </span>
                    </label>
                  
                    <select name="product_id" class="form-control round" id="complaintinput2">
        <option>Select Item</option>
            @foreach ($items as $item)
            @if ($salesByid->id == $item->id)
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
                    <label for="complaintinput3">Sele Date
                         <span class=" text-danger">*</span>
                    </label>
            <input type="date"  class="form-control round" name="sale_date" value="{{$salesByid->sale_date}}">
                </div>


                <div class="form-group">
                    <label for="complaintinput4">
                    Sale Qty <span class=" text-danger">*</span></label>
                    <input type="text" id="qty" class="form-control round" value="{{$salesByid->sale_qty}}" name="sale_qty">
                </div>


                <div class="form-group">
                    <label for="complaintinput5">Price Per Unit</label>
               
                     <input type="text" id="qty" class="form-control round" value="{{$salesByid->sale_unit_price}}" name="sale_unit_price">
                </div>


                <div class="form-group">
                    <label for="customer_id">Select Customer <span class=" text-danger">*</span></label>
            <select name="customer_id" class="form-control round" id="customer_id">
            @foreach ($customers as $customer)
             @if($salesByid->id == $customer->id)
                <option value="{{$customer->id}}" selected="">
                    {{$customer->customer_name}}
                </option>
            @else
            <option value="{{$customer->id}}">
                    {{$customer->customer_name}}
                </option>
             @endif

            @endforeach
                    
                    </select>
                </div>

                <div class="form-group">
                    <label for="sale_note"> Note <span class=" text-danger">*</span></label>
                <textarea class="form-control" name="sale_note"  value="{{$salesByid->sale_note}}">
                    
                      {{$salesByid->sale_note}}
                </textarea>
                </div>
            </div>

            <div class="form-actions">

                <button type="submit" class="btn btn-primary">
                    <a href="{{ route('sale.index') }}">Back To Sales List</a>
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="icon-check2"></i> Update Sales
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