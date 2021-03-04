<?php

namespace App\Policies;

use App\User;
use App\Task;
class TaskPolicy
{
    /**
    * ユーザがそのタスクを持っているかの確認
    * @param User ユーザー型
    * @param Task タスク型
    * @return bool
    */
    public function view(User $user, Task $task){
        return $user->id === $task->user_id;
        //return true;
    }
    /**
    * ユーザがそのタスクを持っているかの確認
    * @param User ユーザー型
    * @param Task タスク型
    * @return bool
    */
    public function edit(User $user, Task $task){
        return $user->id === $task->user_id;
    }
    /**
    * ユーザがそのタスクを持っているかの確認
    * @param User ユーザー型
    * @param Task タスク型
    * @return bool
    */
    public function delete(User $user, Task $task){
        return $user->id === $task->user_id;
    }
    /**
    * ユーザがそのタスクを持っているかの確認
    * @param User ユーザー型
    * @param Task タスク型
    * @return bool
    */
    public function complete(User $user, Task $task){
        return $user->id === $task->user_id;
    }
}
