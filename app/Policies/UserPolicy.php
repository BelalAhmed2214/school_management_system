<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function viewTeacher(User $user)
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
    public function viewStudent(User $user)
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
    public function viewCourses(User $user)
    {
        return $user->role->name === 'Admin';
    }
    public function registerCourse(User $user)
    {
        return $user->role->name === 'Student';
    }

}
