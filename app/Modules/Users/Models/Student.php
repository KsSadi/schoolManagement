<?php

namespace App\Modules\Users\Models;

use App\Modules\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }
}
