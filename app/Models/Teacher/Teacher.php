<?php

namespace App\Models\Teacher;

use App\Models\Traits\HasUuid;
use Database\Factories\TeacherFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory, HasUuid;
    protected $guarded = ['id'];

    protected static function newFactory(): Factory
    {
        return TeacherFactory::new();
    }
}
