<!DOCTYPE html>
<html lang="en">

<!-- Header -->
@include('cms.layouts.header')

<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Start -->
			@include('cms.layouts.navbar')
			<!-- Navbar End -->
		</div>

		<!-- Sidebar -->
		@include('cms.layouts.sidebar')
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<!-- Content -->
				@yield('content')
			</div>
			<!-- Footer Start -->
			@include('cms.layouts.footer')
			<!-- Footer End -->
		</div>
		<!-- End Custom template -->
	</div>

	<!-- JavaScript Libraries -->
	@include('cms.layouts.js')
	@yield('content_js')
	<!-- Template Javascript -->
</body>

</html>