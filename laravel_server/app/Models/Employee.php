<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'Month',
        'Date',
        'Day',
        'ID',
        'EmployeeName',
        'Department',
        'FirstInTime',
        'LastOutTime',
        'HoursOfWork',
    ];
}
