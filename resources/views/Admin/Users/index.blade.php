@extends('Admin.master')
@section('main_content')

<div class="row blank-page">
<div class="card">
<div class="card-block">
<ol>Dashboard / Users</ol>
<span style="float: right">
    <a class="btn btn-info" href="{{ url('user/create') }}">
        <i class="icon-plus"></i>&nbsp;
        Add User
    </a>
</span>
</div>
<div class="row">
<div class="col-xs-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">Total Users List</h4>
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
                <th width="2%">SL</th>
                <th width="4%">Name</th>
                <th width="4%">Email</th>
                <th width="3%">Mobile</th>
                <th width="4%">Image</th>
                <th width="3%">Urole</th>
                <th width="4%">Address</th>
               <th width="10%">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i=1
            @endphp
            @foreach ($users as $user)
                
            <tr>
                <th scope="row">
                    {{$i++}}
                </th>
                <th scope="row">
                	{{$user->name}}
            	</th>
                <td>{{$user->email}}</td>
                <td>{{$user->cell}}</td>
                 <td>
                    @if ($user->image == true)
                        <img src="{{ asset($user->image) }}" width="50" height="50">
                    @else
                    <i class="icon-user"></i>
                    @endif
                    
                </td>
                <td>
                {{$user->urole}}
                </td>
                <td>
                    {{$user->address}}
                </td>
               
                <td>
                	<a href="{{ url('/user/edit',$user->id) }}">
                		<i class="text-info icon-edit2"></i>
                	</a>
                	<a href="{{ url('/user/delete',$user->id) }}" onclick="return confirm('Are You Sure To Deleted')">
                		<i class="text-danger icon-remove">
                		</i>
                	</a>
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