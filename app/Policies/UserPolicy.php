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
//    public function view_teacher(User $user)
//    {
//        return $user->role->name === 'Admin';
//    }
//    public function add_student(User $user)
//    {
//        return $user->role->name === 'Admin';
//    }

}
