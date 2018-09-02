@extends('Admin.Login.master')
@section('content')
<div class="content-body"><section class="flexbox-container">
    <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1  box-shadow-2 p-0">
        <div class="card border-grey border-lighten-3 m-0">
            <div class="card-header no-border">
                <div class="card-title text-xs-center">
                    <div class="p-1 img-fluid"><img src="{{url('public/Admin/')}}/app-assets/images/logo/logo-login.png" width="180" alt="branding logo"></div>
                </div>
                <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>Login with Robust</span></h6>
            </div>
            <div class="card-body collapse in">
                <div class="card-block">
                    <form class="form-horizontal form-simple" action="{{ url('login') }}" method="post">
                         {{ csrf_field() }}
                        <fieldset class="form-group position-relative has-icon-left mb-0">
                            <input type="text" class="form-control form-control-lg input-lg" id="user-name" placeholder="Your Email" name="email">
                            <div class="form-control-position">
                                <i class="icon-head"></i>
                            </div>
                        </fieldset>
                        <fieldset class="form-group position-relative has-icon-left">
                            <input type="password" class="form-control form-control-lg input-lg" id="password" placeholder="Enter Password" name="password">
                            <div class="form-control-position">
                                <i class="icon-key3"></i>
                            </div>
                        </fieldset>
                        <fieldset class="form-group row">
                         
                            <div class="col-md-6 col-xs-12 text-xs-center text-md-right"><a href="{{url('password/reset')}}" class="card-link">Forgot Password?</a></div>
                        </fieldset>
                  {{--       <select name="" class="form-control">
                            <option value="0" selected="selected">
                                Admin
                            </option>
                            <option value="1">Super Admin</option>
                            <option value="2">Cashier</option>
                            <option value="3">Manager</option>
                            <option value="4">Customer</option>
                        </select> --}}
                        <br>
                        <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="icon-unlock2"></i> Login</button>
                    </form>
                </div>
            </div>
            <div class="card-footer">
                <div class="">
                    <p class="float-sm-left text-xs-center m-0"><a href="{{url('password/reset')}}" class="card-link">Recover password</a></p>
                    <p class="float-sm-right text-xs-center m-0">New to Robust? <a href="{{url('register')}}" class="card-link">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

</div>
@endsection