@extends('Admin.master')
@section('main_content')

<div class="row blank-page">
<div class="card">
<div class="card-block">
<ol>Dashboard / Gift Card List</ol>
<span style="float: right">
    <button  id="btn_add" name="btn_add" class="btn btn-primary">
        <i class="icon-plus"></i>&nbsp;
        Add Gift Card
    </button>
</span>
</div>
<div class="row">
<div class="col-xs-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">Total  Gift Card List</h4>
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
<div class="card-block card-dashboard">
   
</div>
<div class="table-responsive">
<table id="myTable" class="display nowrap" cellspacing="0" width="100%">
        <thead class="thead-inverse">
            <tr>
                <th width="2%">Sl</th>
                <th width="2%">Details</th>
                <th width="5%">Card No</th>
                <th width="5%">Value</th>
                <th width="5%">Expiry</th>
               <th width="10%">Action
               <th width="5%">--
               </th>
            </tr>
        </thead>
  <tbody id="giftcard-list" name="giftcard-list">
          @php
            $i=1
          @endphp
            @foreach ($gifts as $gift)
          <tr id="giftcard{{ $gift->id }}">
            <td>{{$i++}}</td>
            <td>
              <a class="btn-sm btn-success" href="{{ url('giftdetails/'.$gift->id) }}">
                 <i class="icon-eye"></i>&nbsp;
              </a>
            </td>
            <td>{{$gift->card_no}}</td>
            <td>
              {{$gift->value}}
            </td>
            <td>
              {{$gift->created_at}}
            </td>
            <td>
          <button class="btn-sm btn-primary btn-detail open_modal" value="{{ $gift->id }}">
              <i class="icon-edit"></i>&nbsp;Edit
          </button>
        </td>
        <td>
      <button class="btn-sm btn-danger btn-delete delete-employee" value="{{$gift->id}}" onclick="return confirm('Are You Sure To Deleted')">
              <i class="icon-remove"></i>&nbsp;Delete
      </button>
            </td>
              </tr>
            @endforeach
        </tbody>  
        
    </table>
    <!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title text-info" id="myModalLabel">
            <i class="fa fa-list"></i>&nbsp;Title</h4>
            
        </div>
        <div class="modal-body">
        <form id="frmProducts" name="frmProducts" class="form-horizontal" novalidate="" role="form">
            <div class="form-group">
             <label for="inputName" class="col-sm-4 control-label">Gift Card No</label>
               <div class="col-sm-8">
                <input type="text" class="form-control has-error" id="card_no" placeholder="Enter Card No" name="card_no" value="">
               </div>
              
            </div>
<div style="clear: both;"></div>
            <div class="form-group">
             <label for="inputName" class="col-sm-4 control-label">Value</label>
               <div class="col-sm-8">
                <input type="text" class="form-control has-error" id="value" name="value" placeholder="Enter Card Value" value="">
               </div>
              
            </div>
    
           
            <div class="form-group">
             <label for="inputName" class="col-sm-4 control-label">Expiry Date</label>
               <div class="col-sm-8">
            <input type="date" class="form-control has-error" id="expiry_date" name="expiry_date" value="">
               </div>
              
            </div>

            <div class="form-group">
             <label for="inputDetail" class="col-sm-4 control-label"></label>

          <input type="submit" name="btn-save" value="add" class="btn btn-primary m-3 p-1" id="btn-save">
                <input type="hidden" id="id" name="id" value="0">
            </div>
        </form>
        </div>
        
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">

        </button>
       
        </div>
    </div>
  </div>
</div>
<!-- end modal div -->


  </div>


</div>
</div>
</div>
</div>
</div>

<meta name="_token" content="{!! csrf_token() !!}" />
      
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

  <script src="{{ asset('public/Admin/')}}/js/giftcard.js"></script>
</div>


 

@endsection