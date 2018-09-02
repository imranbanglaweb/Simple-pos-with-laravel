@extends('Admin.master')
@section('main_content')

<div class="row blank-page">
<div class="card">
<div class="card-block">
<ol>Dashboard / Customers</ol>
<span style="float: right">
    <a class="btn btn-info" href="{{ route('customer.create') }}">
        <i class="icon-plus"></i>&nbsp;
        Add Customer
    </a>
</span>
</div>
<div class="row">
<div class="col-xs-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">Total Customers List</h4>
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
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Image</th>
               <th>Status</th>
               <th>Country</th>
               <th>Action
               </th>
            </tr>
        </thead>
        <tbody>
            @php
                $i=1
            @endphp
            @foreach ($customers as $customer)
                
            <tr>
                <th scope="row">
                    {{$i++}}
                </th>
                <th scope="row">
                	{{$customer->customer_code}}
            	</th>
                <td>{{$customer->customer_name}}</td>
                <td>
                
                    {{$customer->customer_email}}
                </td>
                <td>
                 {{$customer->customer_address}}
               
                </td>
                  <td>
                @if ($customer->customer_image)
                    <img style="border-radius: 50%" src="{{ asset($customer->customer_image) }}" width="50" height="50">
                @else
                    <i class="icon-user-secret"></i>
                    @endif
                    
                </td>
               
                <td>
                @if ($customer->status == '1')
                        Active
                @else
                        Inactive
                @endif
                </td>
               <td>
                    {{$customer->country}}
                </td>
                <td>
            <a href="{{ route('customer.edit',$customer->id) }}">
                <i class="text-info icon-edit2"></i>
            </a>
<form method="post" action="{{route('customer.destroy',$customer->id) }}">
   <button onclick="return confirm('Are You Sure To Deleted')" data-toggle="tooltip" data-placement="top" title="Delete Customer!" class="btn-sm btn-danger" type="submit" >
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