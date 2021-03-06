<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Tests\Feature\ActivityFredTest;
use Illuminate\Support\Arr;

class Project extends Model
{
    use RecordsActivity;

    protected  $guarded = [];



    public function path(){
        return "/projects/{$this->id}";
    }
    public function owner(){
        return $this->belongsTo(User::class);
    }

    public function tasks(){
    return $this->hasMany(Task::class);
    }
    /**
     *Add task to project
     *
     * @param  array $tasks
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function addTasks($tasks)
    {
        return $this->tasks()->createMany($tasks);
    }

    /**
    *Add task to project
     *
     * @param  string $body
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function addTask($body)
    {
        return $this->tasks()->create(compact('body'));
    }



    public function invite(User $user)
    {
        return $this->members()->attach($user);
    }
    public function activity(){
        return   $this->hasMany(Activity::class)->latest();
    }

    public function members()
    {
        return $this->belongsToMany(User::class,'project_members')->withTimestamps();
    }
}
