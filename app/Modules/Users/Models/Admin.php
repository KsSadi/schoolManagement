<?php

namespace App\Modules\Users\Models;

use App\Modules\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = 'users'; // Set the table name explicitly
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type'
    ];
    public function scopeAdmins($query)
    {
        return $query->where('user_type', 'admin');
    }


    // Override the setAttribute method
    public function setAttribute($key, $value)
    {
        if ($key === 'user_type') {
            $value = 'admin';
        }

        parent::setAttribute($key, $value);
    }
}
