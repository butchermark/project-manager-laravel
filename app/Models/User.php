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
        'last_login' => 'datetime',
        'is_suspended' => 'boolean',
        'is_admin' => 'boolean',
    ];


    public static function find($id)
    {
        $users = self::orderBy('name')->find($id);
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
