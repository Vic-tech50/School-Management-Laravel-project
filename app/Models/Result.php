<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id', 'name', 'reg_number', 'assignment', 'first_ca', 'second_ca', 'exam', 'total', 'class','teacher', 'subject', 'term', 'remark', 'grade', 'status'
    ];
}
