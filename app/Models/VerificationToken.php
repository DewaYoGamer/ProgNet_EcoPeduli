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
        'id_token',
        'token',
        'created_at',
    ];

    public $timestamps = false;
}
