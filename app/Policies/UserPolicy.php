<?php

namespace App\Policies;

use App\Models\User;

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
    ///////////// End Student ////////////////////
    //////////// Start Teacher ///////////////////
    public function viewArticles(User $user)
    {
        return $user->role->name === 'Teacher' || $user->role->name === 'Admin';
    }
    public function viewVideos(User $user)
    {
        return $user->role->name === 'Teacher' || $user->role->name === 'Admin';
    }
    public function viewExams(User $user)
    {
        return $user->role->name === 'Teacher' || $user->role->name === 'Admin';
    }
    public function viewTasks(User $user)
    {
        return $user->role->name === 'Teacher' || $user->role->name === 'Admin';
    }

    public function viewLectures(User $user)
    {
        return $user->role->name === 'Teacher';
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
