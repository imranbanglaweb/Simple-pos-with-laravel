@extends('Admin.master')
@section('main_content')

<div class="row blank-page">
<div class="card">
<div class="card-block">
<ol>Dashboard / Edit User</ol>
</div>


<div class="row match-height tex-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-round-controls">
                Edit User</h4>
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
                <div class="card-block">

        <form class="form-horizontal" method="POST" action="{{ url('/user/update') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
            <div class="form-body">

                <div class="form-group{{ $errors->has('s_code') ? ' has-error' : '' }}">
                    <label for="s_code">User Name 
                    <span class=" text-danger">*</span>
                    </label>
                     <input type="hidden" id="id" name="id" value="{{$userByid->id}}">
                     
                    <input type="text" id="s_code" class="form-control round" name="name" value="{{$userByid->name}}">
                   
                     @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="s_name">User Email 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="email" class="form-control round" {{ old('email') }} value="{{$userByid->email}}"  name="email">
      

                </div>

                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                    <label for="address">Address 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="sale_no" class="form-control round" {{ old('address') }} value="{{$userByid->address}}" name="address">
                </div>

                <div class="form-group{{ $errors->has('cell') ? ' has-error' : '' }}">
                    <label for="product_order_level">
                    Phone No<span class=" text-danger">*</span></label>
                    <input type="text" id="cell" class="form-control round" value="{{$userByid->cell}}" name="cell">
                </div>
                   <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                    <label for="image">
                    User Image<span class=" text-danger">*</span></label>
<input type="file" class="form-control round" name="image">
                        <img src="{{ asset($userByid->image) }}" width="50" height="50">
                   <input type="hidden" name="old_img_path" value="{{$userByid->image }}">

                </div>

                <div class="form-group{{ $errors->has('urole') ? ' has-error' : '' }}">
                    <label for="urole">Select User Role <span class=" text-danger">*</span></label>
                    <select name="urole" class="form-control round" id="urole">

                    <option value="admin">
                    Admin
                    </option>
                    <option value="cashier">
                    Cashier
                    </option>
                    <option value="customer">
                    Customer
                    </option>
                    <option value="superadmin">
                    Super Admin
                    </option>
                    </select>
                    @if ($errors->has('urole'))
                <span class="help-block">
                    <strong>
            {{ $errors->first('urole') }}
                            </strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-actions">

                <button type="submit" class="btn btn-primary">
                    <i class="icon-check2"></i> Update User
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