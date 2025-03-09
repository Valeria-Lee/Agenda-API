<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    /** @use HasFactory<\Database\Factories\ReminderFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'date',
    ];

    // Establecer la relacion muchos a uno con User
    /*public function user() {   
        return $this->belongsTo(User::class);
    }*/
}
