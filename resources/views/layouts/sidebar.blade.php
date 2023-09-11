<div class="vertical-menu">

	<div data-simplebar class="h-100">

		<!--- Sidemenu -->
		<div id="sidebar-menu">
			<!-- Left Menu Start -->
			<ul class="metismenu list-unstyled" id="side-menu">
				<li class="menu-title">Main</li>
                @if(Auth::user())
                <li>
                    <a href="{{route('profile.index')}}" class="waves-effect">
                        <i class="mdi mdi-account-group"></i>
                        <span> Profile</span>
                    </a>
                </li>
                @endif
			</ul>
		</div>
		<!-- Sidebar -->
	</div>
</div>
