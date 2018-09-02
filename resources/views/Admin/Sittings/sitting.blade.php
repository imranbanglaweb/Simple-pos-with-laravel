@extends('Admin.master')
@section('main_content')

<div class="row blank-page">
<div class="card">
<div class="card-block">
<ol>Dashboard / Theme Sittings</ol>
</div>


<div class="row match-height tex-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-round-controls">
                Edit Your Theme</h4>
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

        <form class="form-horizontal" method="POST" action="{{ url('/sitting/update') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
            <div class="form-body">

                <div class="form-group{{ $errors->has('theme_title') ? ' has-error' : '' }}">
                    <label for="theme_title">Theme Title 
                    <span class=" text-danger">*</span>
                    </label>
                    <input type="text" id="theme_title" class="form-control round" {{ old('theme_title') }}  name="theme_title" placeholder="Enter Theme Title" value="{{$changeid->theme_title}}">

                     @if ($errors->has('theme_title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('theme_title') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="theme_logo">Select Theme Logo
                     <span class=" text-danger">*</span></label>
                    <input type="file" name="theme_logo" class="form-control">
                    
                    <input type="hidden" name="old_img_path" value="{{$changeid->theme_logo}}">
                </div>

                <div class="form-group{{ $errors->has('theme_dis') ? ' has-error' : '' }}">
                    <label for="theme_dis">Theme Discription 
                    <span class=" text-danger">*</span>
                    </label>
                <textarea name="theme_dis" class="form-control">
                      {{$changeid->theme_dis}}
                </textarea>
                </div>
                <div class="form-group{{ $errors->has('theme_color') ? ' has-error' : '' }}">
                    <label for="theme_color">Theme Color
                    <span class=" text-danger">*</span>
                    </label>
                <input type="color" name="theme_color" class="col-md-4" value="value="{{$changeid->theme_color}}"">
                </div>
       
                
            </div>

            <div class="form-actions">

                <button type="submit" class="btn btn-primary">
                    <i class="icon-check2"></i> Update Theme
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