<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Laravelista\Comments\Commenter;
use Laratrust\Traits\LaratrustUserTrait;
use Laravolt\Avatar\Avatar;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable, LaratrustUserTrait, Commenter, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'location',
        'bio',
        'password',
        'profile_picture'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = [
        'settings'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'name'
    ];

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getNameAttribute()
    {
        return "{$this->attributes['first_name']} {$this->attributes['last_name']}";
    }

    /**
     * Get the user's avatar.
     *
     * @return string
     */
    public function getProfilePictureAttribute()
    {
        if ($this->has('profile_picture')->first()) {
            return $this->profile_picture()->first()->url;
        }

        $avatar = new Avatar();

        return $avatar->create($this->attributes['email'])->toGravatar(['s' => 256]);
    }

    /**
     * Get the profile picture for the user.
     */
    public function profile_picture()
    {
        return $this->hasOne(File::class, 'object_id')->where('type', 'profile_picture');
    }

    /**
     * Get the settings associated with the user.
     */
    public function settings()
    {
        return $this->hasOne(Setting::class);
    }

    /**
     * Get the user's password history.
     */
    public function password_history()
    {
        return $this->hasMany(PasswordHistory::class);
    }
}
