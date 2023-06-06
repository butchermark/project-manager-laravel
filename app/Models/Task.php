<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'status', 'user_id', 'project_id', 'is_archived'
    ];

    protected $casts = [
        'is_archived' => 'boolean'
    ];

    public static function find($id)
    {
        $tasks = self::all();
        foreach ($tasks as $task) {
            if ($task->id == $id) {
                return $task;
            }
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
