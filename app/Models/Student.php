<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'nisn',
        'name',
        'jk',
        'grades_id',
        'years_id'
    ];

    public function grade()
    {
        return $this->hasOne(Grade::class, 'grades_id', 'id');
    }

    public function year()
    {
        return $this->hasOne(Grade::class, 'years_id', 'id');
    }
}
