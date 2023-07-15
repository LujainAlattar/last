<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'subject_id',
        'price',

    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'class_id');
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
