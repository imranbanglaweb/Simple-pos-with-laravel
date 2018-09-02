@extends('Admin.master')
@section('main_content')

<div class="row blank-page">
    <div class="card">
         <div class="card-block">
            <ol>Dashboard / Reports</ol>
        </div>
    </div>
        <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            <h3 class="pink">
                                <i class="icon-circle-thin"></i>
                            </h3>
                            <span>
                        <a href="{{ url('purchase_report') }}">
                                Purchase Report
                            </a></span>
                        </div>
                        <div class="media-right media-middle">
                           <i class="icon-file-pdf-o red font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            <h3 class="pink">
                                <i class="icon-circle-thin"></i>
                            </h3>
                            <span>
                            <a href="{{ url('sales_report') }}">
                             Sales Report
                            </a></span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-file-pdf-o red font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            <h3 class="pink">
                                <i class="icon-circle-thin"></i>
                            </h3>
                            <span>
                            <a href="{{ url('item_report') }}">
                             Item Report
                            </a></span>
                        </div>
                        <div class="media-right media-middle">
                           <i class="icon-file-pdf-o red font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            <h3 class="pink">
                                <i class="icon-circle-thin"></i>
                            </h3>
                            <span>
                            <a href="{{ url('hr_report') }}">
                             Hr Report
                            </a></span>
                        </div>
                        <div class="media-right media-middle">
                           <i class="icon-file-pdf-o red font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            <h3 class="pink">
                                <i class="icon-circle-thin"></i>
                            </h3>
                            <span>
                            <a href="{{ url('user_report') }}">
                             User Report
                            </a></span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-file-pdf-o red font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            <h3 class="pink">
                                <i class="icon-circle-thin"></i>
                            </h3>
                            <span>
                            <a href="{{ url('supplier_report') }}">
                             Supplier Report
                            </a></span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-file-pdf-o red font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
            
           

@endsection