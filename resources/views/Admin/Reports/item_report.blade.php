@extends('Admin.master')
@section('main_content')

<div class="row blank-page">
<div class="card">
<div class="card-block">
<ol>Dashboard / Items</ol>
<span style="float: right">
    <a class="btn btn-info" href="{{ url('report') }}">
        <i class="icon-plus"></i>&nbsp;
        Back To Other Reports
    </a>
</span>
</div>
<div class="row">
<div class="col-xs-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">Total Item List</h4>
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
                <th width="4%">SL</th>
                <th width="4%">Code</th>
                <th width="5%">Name</th>
                <th width="5%">Price</th>
                <th width="10%">Order Level</th>
                <th width="4%">Photo</th>
                <th width="4%">Date</th>
                <th width="4%">Active</th>
               <th width="10%">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i=1
            @endphp
            @foreach ($items as $item)
                
            <tr>
                <th scope="row">
                    {{$i++}}
                </th>
                <th>
                	{{$item->product_code}}
            	</th>
                <td>{{$item->product_name}}</td>
                <td>{{$item->product_price}}</td>
                <td>{{$item->product_order_level}}</td>
                <td>
                <img src="{{$item->product_image}}" width="50" height="50">
                </td>
                <td>
            {{ date('F d, Y',strtotime($item->created_at)) }}
                </td>
                <td>
           @if ($item->product_status == 1)
       <a class="text-info" href="{{ url('status',$item->id) }}" onclick="return confirm('Are You SUre To Inactive Status')">
        <i class="icon-plus"></i>
       Active</a>
           @else
            <a class="text-danger" href="{{ url('statusremove',$item->id) }}" onclick="return confirm('Are You Sure To Status Active')">
                <i class="icon-minus"></i>
                Inactive
            </a>
           @endif
                </td>

                <td>
                	<a href="{{ route('item.edit',$item->id) }}">
                		<i class="text-info icon-edit2"></i>
                	</a>
<form method="post" action="{{route('item.destroy',$item->id) }}">
   <button onclick="return confirm('Are You Sure To Deleted')" data-toggle="tooltip" data-placement="top" title="Delete Item!" class="btn-sm btn-danger" type="submit" >
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
            return 'Details for Item '+data[2]+' Email '+data[3];
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