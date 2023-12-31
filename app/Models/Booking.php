<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'class_id',
        'start_time',
        'end_time',
        'hours',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'book_id');
    }

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id'); // Specify the custom foreign key
    }
}
