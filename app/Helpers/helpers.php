<?php

use App\Models\History;

function add_task($task, $userId)
{
    History::create([
        'task'=>$task,
        'user_id'=>$userId
    ]);
}
