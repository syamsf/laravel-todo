<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ToDo extends Model {
    protected $table = "user_todo";

    protected $fillable = [
        "user_id",
        "activity",
        "priority",
        "is_done",
    ];
}
