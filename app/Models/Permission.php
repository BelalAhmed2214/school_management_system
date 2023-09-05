<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    Const CREATE = 1;
    Const READ = 2;
    Const UPDATE = 3;
    Const DELETE = 4;

}
