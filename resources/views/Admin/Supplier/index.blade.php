@extends('Admin.master')
@section('main_content')

<div class="row blank-page">
<div class="card">
<div class="card-block">
<ol>Dashboard / Items</ol>
<span style="float: right">
    <a class="btn btn-info" href="{{ route('supplier.create') }}">
        <i class="icon-plus"></i>&nbsp;
        Add Supplier
    </a>
</span>
</div>
<div class="row">
<div class="col-xs-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">Total Supplier List</h4>
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
                <th>Sl</th>
                <th>Code</th>
                <th>Company</th>
                <th>Address</th>
               <th>Contact Person</th>
               <th>Phone No</th>
               <th>Status</th>
               <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i=1
            @endphp
            @foreach($suppliers as $supplier)
                
            <tr>
                <td scope="row">
                    {{$i++}}
                </td>
                <td>
                	{{$supplier->supplier_code}}
            	</td>
                <td>{{$supplier->supplier_name}}</td>
                <td>{{$supplier->supplier_address}}</td>
                <td>
                {{$supplier->supplier_contact_person}}
                </td>
                <td>
                    {{$supplier->supplier_phone}}
                </td>
                <td>
        @if ($supplier->supplier_status == 1)
       <a class="text-info" href="{{ url('status',$supplier->id) }}" onclick="return confirm('Are You Sure To Inactive Status')">
        <i class="icon-plus"></i>
       Active</a>
           @else
            <a class="text-danger" href="{{ url('statusremove',$supplier->id) }}" onclick="return confirm('Are You Sure To Status Active')">
                <i class="icon-minus"></i>
                Inactive
            </a>
           @endif   
                </td>
                <td>
            <a href="{{ route('supplier.edit',$supplier->id) }}">
                <i class="text-info icon-edit2"></i>
            </a>
<form method="post" action="{{route('supplier.destroy',$supplier->id) }}">
   <button onclick="return confirm('Are You Sure To Deleted')" data-toggle="tooltip" data-placement="top" title="Delete Supplier!" class="btn-sm btn-danger" type="submit" >
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