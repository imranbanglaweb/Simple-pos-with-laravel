@extends('Admin.master')
@section('main_content')

<div class="row blank-page">
<div class="card">
<div class="card-block">
<ol>Dashboard / Purchase Report</ol>
</div>
<span style="float: right; margin-right: 10px">
    <a class="btn btn-info" href="{{ url('report') }}">
        <i class="icon-plus"></i>&nbsp;
        Back To Other Report
    </a>
</span>
<div class="row">
<div class="col-xs-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">Total Purchase List Report</h4>
<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
   <div id="date_search">
    <p style="color: red"> * You Can Search  With Date Filter</p>
<span>Search From:&nbsp; <input type="text" name="from_date" id="from_date"  placeholder="Enter Date"></span>
To <span> <input type="text" name="to_date" id="to_date" placeholder="Enter Date"> </span>

<button class="btn btn-sm btn-primary" id="filter">
  <i class="icon-search"></i>
  Search
</button>
<a class="btn-sm btn-success" href="purchase_report.php">
  <i class="icon-plus"></i>
Show All Result
</a> 
  </div><!-- end data_search div -->
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
    <div id="order_table">
<table id="myTable" class="display nowrap" cellspacing="0" width="100%">
        <thead class="thead-inverse">
            <tr>
                <th width="1%">S</th>
                <th width="2%">No</th>
                <th width="10%">Purchase Date</th>
                <th width="10%">Price</th>
                <th width="10%">Product Name</th>
                <th width="4%">Supplier</th>
               <th width="4%">Product Image</th>
               <th width="4%">Purchase Qty</th>
               <th width="4%">T Amount</th>
               <th width="10%">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i=1
            @endphp
            @foreach ($purchases as $purchase)
                <tr>
                <td>{{$i++}}</td>
                <td scope="row">
                    {{$purchase->purchase_no}}
                </td>
                <td> 
    {{ date('F d, Y', strtotime($purchase->created_at)) }}
                </td>
                <td>{{$purchase->purchase_price_unit}}</td>
                <td>{{$purchase->product_name}}</td>
                <td>{{$purchase->supplier_name}}</td>
                <td>
                <img src="{{$purchase->product_image}}" width="60" height="50">
                </td>
                <td>
                    {{$purchase->purchase_qty}}
                </td>
                @php
$total_price=$purchase->purchase_qty*$purchase->purchase_price_unit;
                @endphp
                <td>{{$total_price}} Taka</td>
                <td>
<a href="{{ route('purchase.edit',$purchase->id) }}">
        <i class="text-info icon-edit2"></i>
        </a>
<form method="post" action="{{route('purchase.destroy',$purchase->id) }}">
   <button onclick="return confirm('Are You Sure To Deleted')" data-toggle="tooltip" data-placement="top" title="Delete Purchase!" class="btn-sm btn-danger" type="submit" >
     <span class="icon-remove">
     </span>
   </button>
    <input type="hidden" name="_token" value="{{ Session::token() }}">
   {{ method_field('DELETE') }}
</form>﻿
                </td>
            </tr>
            @endforeach
            
           
        </tbody>
    </table>
    </div>   
</div>
</div>
</div>
</div>
</div>
</div>


</div>


{{-- Datatable --}}
{{-- <script>
$(document).ready(function() {
    $('#myTable').DataTable( {

        dom: 'Bfrtip',
        buttons: [
             'csv', 'excel', 
            {
                extend: 'pdfHtml5',
                download: 'open',
                  exportOptions: {
                columns: [ 0,1,2,3,4,5,6,7,8],
                stripHtml: false
                }
            },
            {
                extend: 'print',
                exportOptions: {
               columns: [ 0,1,2,3,4,5,6,7,8],
                stripHtml: false
                }
            },
            'colvis'
        ],
            responsive: {

            details: {

                display: $.fn.dataTable.Responsive.display.modal( {
                    header: function ( row ) {
                        var data = row.data();
            return 'Details for Purchase '+data[2]+' Email '+data[3];
                    }
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll()

            },

        },

         columnDefs: [ {
            targets: -1,
            visible: true
        } ],

    } );
} );
</script> --}}
<!-- date Search -->

 <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script> 
 <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script>  
  $(document).ready(function()
  {  
       $.datepicker.setDefaults({  
            dateFormat: 'yy-mm-dd'   
       }); 
        
       $(function()
       {  
            $("#from_date").datepicker();  
            $("#to_date").datepicker();  
       });  
       $('#filter').click(function()
       {  
            var from_date = $('#from_date').val();  
            var to_date = $('#to_date').val();  
            if(from_date != '' && to_date != '')  
            {  
                 $.ajax({  
                      url:"Ajax/purchase_report",  
                      method:"POST",  
                      data:{from_date:from_date, to_date:to_date},  
                      success:function(data) //response  
                      {  
                          $('#order_table').html(data);  
                      }  
                 });  
            }  
            else  
            {  
                 alert("Please Select Date");  
            }  
       });  
  });  
 </script>
@endsection