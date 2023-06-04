<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['course_name'];
    use HasFactory;



    public function student()
    {
        return $this->belongsToMany(Student::class);
    }

}
