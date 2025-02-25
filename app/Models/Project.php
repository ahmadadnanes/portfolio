<?php

namespace App\Models;

use App\Http\Controllers\SkillController;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name' , 'skill_id' , 'image' , 'project_url' , 'created_at'];

    public function skills(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Skill::class);
    }
}
