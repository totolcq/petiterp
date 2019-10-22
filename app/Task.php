<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
        'started_at',
        'stopped_at',
        'completed',
    ];
    public function ressources()
    {
        return $this->hasMany(Ressource::class);
    }
    public function project()
    {
        return $this->belongsTo(Project::class);
    }    
}
