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
                    <!-- Check the authorization using a condition -->
                    @if(Auth::user()->role_id==1)
                        <li>
                            <a href="{{route('teachers.index')}}" class="waves-effect">
                                <i class="mdi mdi-account-group"></i>
                                <span>Teachers</span>
                            </a>
                        </li>
                    @endif

                    <li>
                        <a href="{{route('admin.students.index')}}" class="waves-effect">
                            <i class="mdi mdi-account-group"></i>
                            <span>Students</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('admin.courses.index')}}" class="waves-effect">
                            <i class="mdi mdi-account-group"></i>
                            <span>Courses</span>
                        </a>
                    </li>




                @endif
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
