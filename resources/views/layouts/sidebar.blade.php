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
                    @can('viewTeacher',App\Models\User::class)
                            <li>
                            <a href="{{route('admin.teachers.index')}}" class="waves-effect">
                                <i class="mdi mdi-account-group"></i>
                                <span>Teachers</span>
                            </a>
                        </li>
                    @endcan

                    @can('viewStudent',App\Models\User::class)
                    <li>
                        <a href="{{route('admin.students.index')}}" class="waves-effect">
                            <i class="mdi mdi-account-group"></i>
                            <span>Students</span>
                        </a>
                    </li>
                    @endcan

                    @can('viewCourses',App\Models\User::class)
                    <li>
                        <a href="{{route('admin.courses.index')}}" class="waves-effect">
                            <i class="mdi mdi-account-group"></i>
                            <span>Courses</span>
                        </a>
                    </li>
                    @endcan
                    @can('registerCourse',App\Models\User::class)

                    <li>
                        <a href="{{route('student.courses.create')}}" class="waves-effect">
                            <i class="mdi mdi-account-group"></i>
                            <span>Courses</span>
                        </a>
                    </li>
                    @endcan


                @endif



            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
