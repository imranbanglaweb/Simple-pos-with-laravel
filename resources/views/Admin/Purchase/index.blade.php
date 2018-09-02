@extends('Admin.master')
@section('main_content')

<div class="row blank-page">
<div class="card">
<div class="card-block">
<ol>Dashboard / Purchase</ol>
</div>
<span style="float: right; margin-right: 10px">
    <a class="btn btn-info" href="{{ route('purchase.create') }}">
        <i class="icon-plus"></i>&nbsp;
        Add Purchase
    </a>
</span>
<div class="row">
<div class="col-xs-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">Total Purchase List</h4>
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


{{-- Datatable --}}
<script>
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
</script>

@endsection