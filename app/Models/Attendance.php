<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
     protected $fillable = [
        'class_id',
        'student_id',
        'status',
        'student_name',
        'student_lastname',
        'student_regnum',
        'date',
        'teacher_id'
    ];
       
}
