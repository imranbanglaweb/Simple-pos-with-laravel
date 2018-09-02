<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta name="description" content="">
<meta name="keywords" content="POS">
<meta name="author" content="Imran">
<title>@yield('title','POS-Point Of Sale')</title>
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<!-- BEGIN VENDOR CSS-->
<link rel="stylesheet" type="text/css" href="{{ url('public/Admin/') }}/app-assets/css/bootstrap.css">
<!-- font icons-->
<link rel="stylesheet" type="text/css" href="{{ url('public/Admin/') }}/app-assets/fonts/icomoon.css">
<link rel="stylesheet" type="text/css" href="{{ url('public/Admin/') }}/app-assets/fonts/flag-icon-css/css/flag-icon.min.css">
<link rel="stylesheet" type="text/css" href="{{ url('public/Admin/') }}/app-assets/vendors/css/extensions/pace.css">
<!-- END VENDOR CSS-->
<!-- BEGIN ROBUST CSS-->
<link rel="stylesheet" type="text/css" href="{{ url('public/Admin/') }}/app-assets/css/bootstrap-extended.css">
<link rel="stylesheet" type="text/css" href="{{ url('public/Admin/') }}/app-assets/css/app.css">
<link rel="stylesheet" type="text/css" href="{{ url('public/Admin/') }}/app-assets/css/colors.css">
<!-- END ROBUST CSS-->
<!-- BEGIN Page Level CSS-->
<link rel="stylesheet" type="text/css" href="{{ url('public/Admin/') }}/app-assets/css/core/menu/menu-types/vertical-menu.css">
<link rel="stylesheet" type="text/css" href="{{ url('public/Admin/') }}/app-assets/css/core/menu/menu-types/vertical-overlay-menu.css">
<link rel="stylesheet" type="text/css" href="{{ url('public/Admin/') }}/app-assets/css/core/colors/palette-gradient.css">
<!-- END Page Level CSS-->
<!-- BEGIN Custom CSS-->
<link rel="stylesheet" type="text/css" href="{{ url('public/Admin/') }}/assets/css/style.css">
<!-- END Custom CSS-->
<script type="text/javascript" src="{{ asset('public/Admin/js/main.js') }}"></script>

@include('Admin.includes.favicon')

<style type="text/css">
  .clockStyle {
    background-color: rgba(41, 45, 179, 0.66);
    border: #999 2px inset;
    padding: 5px;
    color: white;
    font-family: "Arial Black", Gadget, sans-serif;
    font-size: 14px;
    /* font-weight: bold; */
    letter-spacing: 3px;
    display: inline-block;
    /* border-radius: 8px; */
    position: absolute;
    top: 113px;
    right: 35px;
    z-index: 2;

}
</style>
<!-- fakeLoader CSS -->
<script src="{{asset('public/Admin/')}}/js/jquery-2.1.4.min.js"></script>
<link href="{{asset('public/Admin/app-assets/')}}/css/fakeLoader.css" rel='stylesheet'>
<link href="{{asset('public/Admin/app-assets/')}}/css/spectrum.css" rel='stylesheet'>

<link rel="stylesheet" href="{{asset('public/Admin/app-assets/')}}/css/custom.css">
</head>
<div class="loader"></div>
<div class="outer-box"></div>

<script>
   $(window).load(function(){
     $('.loader').fadeOut();
});
 </script>
<div id="clockDisplay" class="clockStyle"></div>
<br>