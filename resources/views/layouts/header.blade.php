<header id="page-topbar">
	<div class="navbar-header">
		<div class="d-flex">
			<!-- LOGO -->


			<button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
				<i class="mdi mdi-menu"></i>
			</button>

			<div class="d-none d-sm-block ml-2">
				<h4 class="page-title">Dashboard</h4>
			</div>
		</div>


			<div>
				@if(Auth::user())
					<form action="{{ route("logout") }}" method="post">
						@csrf
						<input type="submit" class="btn header-item waves-effect" value="Logout">
					</form>
				@else
					<a href="{{ route("login") }}" class="d-flex w-100 h-100 btn header-item waves-effect align-items-center">
						<div>
							Login
						</div>
					</a>
				@endif
			</div>
		</div>
	</div>
</header>
