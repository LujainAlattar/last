<?php

namespace App\Models;

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
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'phone',
        'img',
        'password',
        'birthday',
        'age',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Calculate the age based on the birthday.
     *
     * @return int|null
     */
    public function getAgeAttribute(): ?int
    {
        if ($this->birthday) {
            return now()->diffInYears($this->birthday);
        }
        return null;
    }

    // relation with role one role to many users
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // reltion with classes and teacher one to one
    public function class()
    {
        return $this->hasOne(Classes::class);
    }
    public function classes()
    {
        return $this->hasMany(Classes::class, 'user_id');
    }

    public function appointments()
    {
        return $this->hasManyThrough(Booking::class, Classes::class, 'user_id', 'class_id');
    }


}
