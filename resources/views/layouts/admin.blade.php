<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,
		shrink-to-fit=no">
	<title>{{ env('APP_NAME') }} – admin</title>
	<link rel="stylesheet" href="http://www.bootstrapdash.com/demo/stellar-admin/jquery/css/style.css">
</head>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
	integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
	crossorigin="anonymous">
</script>

<script>
(function($) {
  'use strict';
  $(function() {
    var body = $('body');
    var contentWrapper = $('.content-wrapper');
    var scroller = $('.container-scroller');
    var footer = $('.footer');
    var sidebar = $('.sidebar');

    //Add active class to nav-link based on url dynamically
    //Active class can be hard coded directly in html file also as required
    var current = location.pathname.split("/").slice(-1)[0].replace(/^\/|\/$/g, '');
    $('.nav li a', sidebar).each(function(){
        var $this = $(this);
        if(current === "") {

          //for root url
          if($this.attr('href').indexOf("{{ route('admin') }}") !== -1){
              $(this).parents('.nav-item').last().addClass('active');
              if ($(this).parents('.sub-menu').length) {
                $(this).closest('.collapse').addClass('show');
                $(this).addClass('active');
              }
          }
        }
        else {

          //for other url
          if($this.attr('href').indexOf(current) !== -1){
              $(this).parents('.nav-item').last().addClass('active');
              if ($(this).parents('.sub-menu').length) {
                $(this).closest('.collapse').addClass('show');
                $(this).addClass('active');
              }
          }
        }
    })

		// Sidebar minimize.
    $('[data-toggle="minimize"]').on("click", function () {
      if((body.hasClass('sidebar-toggle-display'))||(body.hasClass('sidebar-absolute'))) {
        body.toggleClass('sidebar-hidden');
      }
      else {
        body.toggleClass('sidebar-icon-only');
      }
    });
  });
})(jQuery);
</script>

<!-- Mobile version sidebar. -->
<script>
(function($) {
  'use strict';
  $(function() {
    $('[data-toggle="offcanvas"]').on("click", function () {
      $('.row-offcanvas').toggleClass('active')
    });
  });
})(jQuery);
</script>

<body>
	<div class="container-scroller">
		<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
			<div class="text-center navbar-brand-wrapper">
				<a class="navbar-brand brand-logo" href="{{ route('admin') }}">
					<img src="images/logo.svg" alt="logo">
				</a>
				<a class="navbar-brand brand-logo-mini" href="{{ route('admin') }}">
					<img src="images/logo_mini.svg" alt="sm-l">
				</a>
			</div>
			<div class="navbar-menu-wrapper d-flex align-items-center">
				<button class="navbar-toggler navbar-toggler d-none d-lg-block
						align-self-center mr-2" type="button" data-toggle="minimize">
					<i class="fas fa-bars"></i>
				</button>
				<p class="page-name d-none d-lg-block">Hi, {{ Auth::user()->name }}</p>
				<button class="navbar-toggler navbar-toggler-right d-lg-none
						align-self-center ml-auto" type="button" data-toggle="offcanvas">
					<i class="fas fa-bars"></i>
				</button>
			</div>
		</nav>
		<!-- partial -->
		<div class="container-fluid page-body-wrapper">
			<div class="row row-offcanvas row-offcanvas-right">
				<!-- partial:partials/_sidebar.html -->
				<nav class="sidebar sidebar-offcanvas" id="sidebar">
					<ul class="nav">

						<li class="nav-item nav-category">
							<span class="nav-link">GENERAL</span>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('admin.users') }}">
								<span class="menu-title">Users</span>
								<i class="fas fa-users"></i>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('admin.test') }}">
								<span class="menu-title">Test</span>
							</a>
						</li>


						<li class="nav-item nav-category">
							<span class="nav-link">SOMETHING</span>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('admin.test') }}">
								<span class="menu-title">page</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">
								<span class="menu-title">page</span>
							</a>
						</li>

					</ul>
				</nav>
				<!-- partial -->
				<div class="content-wrapper">
					<!-- Begin first card -->
					<div class="row">
						<div class="col-lg-12 grid-margin">
							<div class="card overflow-hidden dashboard-curved-chart">
								<div class="card-body mx-3">
									@yield ('content')
								</div>
								<div id="curved-line-chart" class="float-chart
									float-chart-mini">
								</div>
							</div>
						</div>
					</div>
				<!-- ROW ENDS -->
				</div>
				<!-- content-wrapper ends -->
				<!-- partial:partials/_footer.html -->
				<footer class="footer">
					<div class="container-fluid clearfix">
						<span class="text-muted d-block text-center text-sm-left
								d-sm-inline-block">
							Footbar.
						</span>
						<span class="float-none float-sm-right d-block mt-1 mt-sm-0
								text-center">
							footbar 2
						</span>
					</div>
				</footer>
		<!-- partial -->
			</div>
	<!-- row-offcanvas ends -->
		</div>
	<!-- page-body-wrapper ends -->
	</div>
<script src="https://kit.fontawesome.com/2bc6e3108f.js"></script>

</body>

</html>
