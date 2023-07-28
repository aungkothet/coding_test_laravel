<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Trait\Commenter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    use Commenter;
    
    protected $primaryKey = 'user_id';
    protected $table = 'MY-USER';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'login_password_hash',
        'login_password_salt',
        'first_name',
        'last_name',
        'email',
        'email_verified_datetime',
        'user_creation_datetime',
        'user_acct_status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'login_password_hash',
        'login_password_salt'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_datetime' => 'datetime',
        'user_creation_datetime' => 'datetime',
        'login_password_hash' => 'hashed',
    ];

    public function getAuthPassword()
    {
        return $this->login_password_hash;
    }

}
