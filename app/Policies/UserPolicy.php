<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Lecture;
use Illuminate\Support\Facades\Auth;
class UserPolicy
{
    ////////////// Start Admin ////////////////////////

    ////////////// Start Teacher //////////////////////
    public function viewTeachers(User $user)
    {
        return $user->role->name === 'Admin';
    }
    public function addTeacher(User $user)
    {
        return $user->role->name === 'Admin';
    }
    public function editTeacher(User $user)
    {
        return $user->role->name === 'Admin';
    }
    public function deleteTeacher(User $user)
    {
        return $user->role->name === 'Admin';
    }
    ///////////// End Teacher /////////////////
    //////////// Start Student //////////////////////
    public function viewStudents(User $user)
    {
        return $user->role->name === 'Admin';
    }
    public function addStudent(User $user)
    {
        return $user->role->name === 'Admin';
    }
    public function editStudent(User $user)
    {
        return $user->role->name === 'Admin';
    }
    public function deleteStudent(User $user)
    {
        return $user->role->name === 'Admin';
    }
    ///////////// End Student /////////////////
    ///////////// Start Course /////////////////

    public function viewCourses(User $user)
    {
        return $user->role->name === 'Admin';
    }
    public function addCourse(User $user)
    {
        return $user->role->name === 'Admin';
    }
    public function editCourse(User $user)
    {
        return $user->role->name === 'Admin';
    }
    public function deleteCourse(User $user)
    {
        return $user->role->name === 'Admin';
    }
    ///////////// End Student /////////////////

    ////////////// End Admin ////////////////////////


    ///////////// Start Student ////////////////////

    public function viewEnrolledCourses(User $user)
    {
        return $user->role->name === 'Student';

    }
    public function registerCourse(User $user)
    {
        return $user->role->name === 'Student';
    }
    public function viewPublishedExams(User $user)
    {
        return $user->role->name === 'Student';
    }
    ///////////// End Student ////////////////////
    //////////// Start Teacher ///////////////////
    public function viewExams(User $user)
    {
        return $user->role->name === 'Teacher' || $user->role->name === 'Student' ;
    }
    public function viewStudentExams(User $user)
    {
        return $user->role->name === 'Student';
    }
    public function viewStudentTasks(User $user)
    {
        return $user->role->name === 'Student';
    }
    public function addExams(User $user)
    {
        return $user->role->name === 'Teacher';
    }
    public function editExams(User $user)
    {
        return $user->role->name === 'Teacher';
    }
    public function deleteExams(User $user)
    {
        return $user->role->name === 'Teacher';
    }
    public function viewTasks(User $user)
    {
        return $user->role->name === 'Teacher' || $user->role->name === 'Admin' || $user->role->name === 'Student';
    }
    public function addTasks(User $user)
    {
        return $user->role->name === 'Teacher';
    }
    public function editTasks(User $user)
    {
        return $user->role->name === 'Teacher';
    }
    public function deleteTasks(User $user)
    {
        return $user->role->name === 'Teacher';
    }
    public function viewLectures(User $user)
    {
        return $user->role->name === 'Teacher';
    }
    public function addLecture(User $user)
    {
        return $user->role->name === 'Teacher';
    }
    public function editLecture(User $user,Lecture $lecture)
    {
        return $user->role->name === 'Teacher' && $user->id === $lecture->user_id;
    }

    public function deleteLecture(User $user, Lecture $lecture)
    {
        return $user->role->name === 'Teacher' && $user->id === $lecture->user_id;
    }


    public function viewAssignment(User $user)
    {
        return $user->role->name === 'Teacher';
    }
    public function viewResults(User $user)
    {
        return $user->role->name === 'Teacher';
    }
    /////////// End Teacher //////////////////////


}
