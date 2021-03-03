<?php

namespace App\Policies;

use App\User;
use App\Task;
class TaskPolicy
{
    public function view(User $user, Task $task){
        return $user->id === $task->user_id;
        //return true;
    }
    public function edit(User $user, Task $task){
        return $user->id === $task->user_id;
    }
    public function delete(User $user, Task $task){
        return $user->id === $task->user_id;
    }
    public function complete(User $user, Task $task){
        return $user->id === $task->user_id;
    }
}
