<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TaskTag extends Model
{
    use HasFactory;
    public $guarded = ['id'];

//    public function task()
//    {
//        return $this->hasOne(Task::class);
//    }
//    public function tag()
//    {
//        return $this->hasOne(Tag::class);
//    }
}
