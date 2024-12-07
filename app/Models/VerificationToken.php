<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerificationToken extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'email',
        'password',
        'name',
        'username',
        'notelp',
        'id_token',
        'token',
        'created_at',
        'type'
        // 0 = Register
        // 1 = Forgot Password
        // 2 = Forgot Username
        // 3 = Update
    ];

    public $timestamps = false;
}
