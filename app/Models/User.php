<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }

    public function profileExists($profile)
    {
        if(is_string($profile)){
            $profile = Profile::where('name', $profile)->firstOrFail();
        }
        return (boolean) $this->profiles()->find($profile->id);
    }

    public function isAdmin()
    {
        return $this->profileExists('Super Admin');
    }

    public function hasOnePermission($profile)
    {
        $userProfile = $this->profiles;
        return $profile->intersect($userProfile)->count();
    }
}
