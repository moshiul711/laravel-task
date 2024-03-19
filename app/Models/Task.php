<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Task extends Model
{
    use HasFactory;
    public static $task;
    public $guarded =[
        'id'];
    // public static function storeTask($request)
    // {
    //     self::$task = new Task();
    //     self::$task->title = $request->title;
    //     self::$task->description = $request->description;
    //     self::$task->save();
    //     return self::$task;
    // }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class,);
    }
}
