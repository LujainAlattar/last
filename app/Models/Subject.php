<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'subject_name',
    ];

    public function classes()
    {
        return $this->hasMany(Classes::class);
    }
}
