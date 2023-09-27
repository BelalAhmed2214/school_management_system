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

                    <li>
                        <a href="#" class="waves-effect">
                            <i class="mdi mdi-account-group"></i>
                            <span>Chat</span>
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


                    @can('viewLectures',\App\Models\User::class)
                            <li>
                                <a href="{{route('teacher.lecture.index')}}" class="waves-effect">
                                    <i class="mdi mdi-account-group"></i>
                                    <span>Lectures</span></a>
                            </li>
                    @endcan
                    @can('viewAssignment',\App\Models\User::class)

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="mdi mdi-buffer"></i>
                            <span>Assignment</span>
                        </a>
                        <ul>
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

                        </ul>
                    </li>
                    @endcan


                    @can('viewResults',\App\Models\User::class)

                    <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-buffer"></i>
                        <span>Results</span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('teacher.examResult.index')}}" class="waves-effect">
                                <i class="mdi mdi-account-group"></i>
                                <span>Exams</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('teacher.taskResult.index')}}" class="waves-effect">
                                <i class="mdi mdi-account-group"></i>
                                <span>Tasks</span>
                            </a>
                        </li>

                    </ul>
                </li>
                    @endcan
                @endif
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
