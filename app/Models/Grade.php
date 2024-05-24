<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    protected $fillable = ['kelas'];
    public function student()
    {
        return $this->hasMany(Student::class);
    }
    public function year()
    {
        return $this->hasOne(Year::class);
    }
}
