<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordHistory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'password'];

    /**
     * Get the user that used this password.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
