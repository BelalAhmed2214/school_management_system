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
                    @can('viewTeachers',App\Models\User::class)
                            <li>
                            <a href="{{route('admin.teacher.index')}}" class="waves-effect">
                                <i class="mdi mdi-account-group"></i>
                                <span>Teachers</span>
                            </a>
                        </li>
                    @endcan

                    @can('viewStudents',App\Models\User::class)
                    <li>
                        <a href="{{route('admin.student.index')}}" class="waves-effect">
                            <i class="mdi mdi-account-group"></i>
                            <span>Students</span>
                        </a>
                    </li>
                    @endcan

                    @can('viewCourses',App\Models\User::class)
                    <li>
                        <a href="{{route('admin.course.index')}}" class="waves-effect">
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
                    @can('viewArticles',App\Models\User::class)
                    <li>
                        <a href="{{route('teacher.article.index')}}" class="waves-effect">
                            <i class="mdi mdi-account-group"></i>
                            <span>Articles</span>
                        </a>
                    </li>
                    @endcan
                    @can('viewVideos',App\Models\User::class)

                    <li>
                        <a href="{{route('teacher.video.index')}}" class="waves-effect">
                            <i class="mdi mdi-account-group"></i>
                            <span>Videos</span>
                        </a>
                    </li>
                    @endcan
                    @can('viewExams',App\Models\User::class)
                    <li>
                        <a href="{{route('teacher.exam.index')}}" class="waves-effect">
                            <i class="mdi mdi-account-group"></i>
                            <span>Exams</span>
                        </a>
                    </li>
                    @endcan
                    @can('viewTasks',App\Models\User::class)
                    <li>
                        <a href="{{route('teacher.task.index')}}" class="waves-effect">
                            <i class="mdi mdi-account-group"></i>
                            <span>Tasks</span>
                        </a>
                    </li>
                    @endcan

                @endif



            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
