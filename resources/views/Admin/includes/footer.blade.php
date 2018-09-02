<footer class="footer footer-static footer-light navbar-border">
  <p class="clearfix text-muted text-sm-center mb-0 px-2"><span class="float-md-left d-xs-block d-md-inline-block">Copyright  &copy; 2017 <a href="http://imranweb-bd.com" target="_blank" class="text-bold-800 grey darken-2">Imran </a>, All rights reserved. </span><span class="float-md-right d-xs-block d-md-inline-block">Imranweb-bd.com<i class="icon-heart5 pink"></i></span></p>
</footer>
<script>
function renderTime() {
var currentTime = new Date();
var diem = "AM";
var h = currentTime.getHours();
var m = currentTime.getMinutes();
var s = currentTime.getSeconds();
setTimeout('renderTime()',1000);
if (h == 0) {
	h = 12;
} else if (h > 12) { 
	h = h - 12;
	diem="PM";
}
if (h < 10) {
	h = "0" + h;
}
if (m < 10) {
	m = "0" + m;
}
if (s < 10) {
	s = "0" + s;
}
var myClock = document.getElementById('clockDisplay');
myClock.textContent = h + ":" + m + ":" + s + " " + diem;
myClock.innerText = h + ":" + m + ":" + s + " " + diem;
}
renderTime();
</script>
<!--js -->


<div class="top">
         <i class="fa fa-arrow-up">top</i>
</div>
<script>
 $(document).ready(function() {
     // Show or hide the sticky footer button
     $(window).scroll(function() {
         if ($(this).scrollTop() > 400) {
             $('.top').fadeIn(400);
         } else {
             $('.top').fadeOut(400);
         }
     });
 
     // Animate the scroll to top
     $('.top').click(function(event) {
         event.preventDefault();
 
         $('html, body').animate({scrollTop: 0}, 600);
     })
 });
</script> 

    <!-- END PAGE LEVEL JS-->
@include('Admin.includes.notification')
<!-- BEGIN VENDOR JS-->
    <script src="{{ url('public/Admin/') }}/app-assets/js/core/libraries/jquery.min.js" type="text/javascript"></script>
    <script src="{{ url('public/Admin/') }}/app-assets/vendors/js/ui/tether.min.js" type="text/javascript"></script>
    <script src="{{ url('public/Admin/') }}/app-assets/js/core/libraries/bootstrap.min.js" type="text/javascript"></script>
    <script src="{{ url('public/Admin/') }}/app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="{{ url('public/Admin/') }}/app-assets/vendors/js/ui/unison.min.js" type="text/javascript"></script>
    <script src="{{ url('public/Admin/') }}/app-assets/vendors/js/ui/blockUI.min.js" type="text/javascript"></script>
    <script src="{{ url('public/Admin/') }}/app-assets/vendors/js/ui/jquery.matchHeight-min.js" type="text/javascript"></script>
    <script src="{{ url('public/Admin/') }}/app-assets/vendors/js/ui/screenfull.min.js" type="text/javascript"></script>
    <script src="{{ url('public/Admin/') }}/app-assets/vendors/js/extensions/pace.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{ url('public/Admin/') }}/app-assets/vendors/js/charts/chart.min.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN ROBUST JS-->
    <script src="{{ url('public/Admin/') }}/app-assets/js/core/app-menu.js" type="text/javascript"></script>
    <script src="{{ url('public/Admin/') }}/app-assets/js/core/app.js" type="text/javascript"></script>
    <!-- END ROBUST JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{ url('public/Admin/') }}/app-assets/js/scripts/pages/dashboard-lite.js" type="text/javascript"></script>
     <script src="{{asset('public/Admin/')}}/js/jquery.nicescroll.min.js"></script>
     
<script>
  $("body").niceScroll({
cursorcolor:"#456bb7",
cursorwidth:"6px",
cursorborder:"1px solid aquamarine",
cursorborderradius:2
});
</script>
{{-- Datatable --}}
@include ('Admin.includes.datatable')


  </body>
</html>
