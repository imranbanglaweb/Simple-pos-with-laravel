@extends('Admin.master')
@section('main_content')

<div class="row blank-page">
<div class="card">
<div class="card-block">
<ol>Dashboard / View Of Gift Card</ol>

</div>

<div class="row">
<div class="col-xs-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">View Of Gift Card</h4>
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
   <h3 class="text-info">
    Details Of Card Number Is
    {{$giftcard_det_id->card_no}}
    </h3>

    <span style="float: right; padding: 5px">
        <a href="{{ url('giftcard') }}" class="btn btn-info">
        <i class="icon-list"></i>
            Back To Employee List
        </a>
    </span>
</div>

<div class="row">
    <div class="col-md-10">
        <div id="card_details">
            <h3>Gift Card</h3> 
            <span class="card_number">{{$giftcard_det_id->card_no}}</span>
            <h1>USD  {{$giftcard_det_id->value}}</h1>
            <p>Expiry  : 
{{ date('F d, Y', strtotime($giftcard_det_id->created_at)) }}
            </p>
        </div>
        <br>
        <hr>
        <div id="card_details_back">
            <h3>Gift Card</h3> 
            <p></p>
        </div>
    </div> 
  

</div>
<br>
<br>
</div>
</div>
</div>
</div>
</div>


</div>



@endsection