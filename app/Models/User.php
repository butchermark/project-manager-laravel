<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;


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
