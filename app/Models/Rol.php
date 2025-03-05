<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    /** @use HasFactory<\Database\Factories\RolFactory> */
    use HasFactory;

    // Establecer la relacion uno a muchos con User
    public function user() {
        return $this->hasMany(User::class);
    }
}
