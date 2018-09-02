@include('Admin.includes.header')
  <body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">

    <!-- navbar-fixed-top-->
   @include('Admin.includes.navbar-fixed-top')

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <!-- main menu-->
   
    <!-- / main menu-->
 @include('Admin.includes.main-menu')
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- stats -->
@yield('main_content')

        </div>
      </div>
    </div>
@include('Admin.includes.footer')


