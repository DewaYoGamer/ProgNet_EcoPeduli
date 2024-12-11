<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordResetToken extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'id_token',
        'created_at'
    ];

    public $timestamps = false;
}
