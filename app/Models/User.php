<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password'];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public static function find($id)
    {
        $users = self::all();
        foreach ($users as $user) {
            if ($user->id == $id) {
                return $user;
            }
        }
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'user_id');
    }
}
