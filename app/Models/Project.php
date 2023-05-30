<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public static function find($id)
    {
        $projects = self::all();
        foreach ($projects as $project) {
            if ($project->id == $id) {
                return $project;
            }
        }
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
