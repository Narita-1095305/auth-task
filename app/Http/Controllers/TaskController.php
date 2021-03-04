<?php

namespace App\Http\Controllers;

use App\Task;
use App\Http\Requests\CreateTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    public function index(){
        $user = Auth::user();
        $tasks = $user->tasks()->where('status','!=','3')->paginate(5);
        
        return view('tasks.index',compact('tasks'))->with('message', '');
    }

    public function search(Request $request){
        $user = Auth::user();
		$keyword = $request->input('keyword');
		if(!empty($keyword)){
            $tasks = $user->tasks()->where('title','like','%'.$keyword.'%')->where('status','!=','3')->orderBy('id', 'asc')->paginate(5);
		}else{
			return redirect('/tasks');
		}
		return view('tasks.index',compact('tasks'),compact('keyword'));
	}

    public function all(){
        $user = Auth::user();
        $tasks = $user->tasks()->paginate(5);
        
        return view('tasks.index',compact('tasks'))->with('message', '');
    }

    public function done(){
        $user = Auth::user();
        $tasks = $user->tasks()->where('status','3')->paginate(5);
        
        return view('tasks.index',compact('tasks'))->with('message', '');
    }

    public function sortByDuedate(){
        $user = Auth::user();
        $tasks = $user->tasks()->where('status','!=','3')->orderBy('due_date','asc')->paginate(5);

        return view('tasks.index',compact('tasks'))->with('message', '');
    }

    
    public function showAddForm(){
        return view('tasks.add');
    }

    public function add(CreateTask $request){
        $user_id = Auth::id();
        $savedata = [
            'title' => $request->title,
            'status' => $request->status,
            'due_date' => $request->due_date = date('Y-m-d H:i:s',strtotime($request->due_date)),
            'comment' => $request->comment,
            'user_id' => $user_id,
        ];
        $task = new Task;
        $task->fill($savedata)->save();
        return redirect('/tasks')->with('message','タスクを追加しました');
    }

    public function edit(int $task_id, CreateTask $request){
        $task = Task::find($task_id);

        $savedata = [
            'title' => $request->title,
            'status' => $request->status,
            'due_date' => $request->due_date = date('Y-m-d H:i:s',strtotime($request->due_date)),
            'comment' => $request->comment,
        ];
        $this->authorize('edit',$task);
        $task->fill($savedata)->save();

        return redirect('/tasks')->with('message','タスクを編集しました');
    }

    public function showEditForm(int $task_id){
        $task = Task::find($task_id);
        if(is_null($task)){
            abort(404);
        }
        $this->authorize('view',$task);
        return view('tasks.edit',['task'=>$task]);
    }

    public function showCompleteForm(int $task_id){
        $task = Task::find($task_id);
        if(is_null($task)){
            abort(404);
        }
        $this->authorize('complete',$task);
        return view('tasks.complete',['task'=>$task]);
    }

    public function complete(int $task_id){
        $task = Task::find($task_id);

        $savedata = [
            'status' => 3,
        ];
        $this->authorize('complete',$task);
        $task->fill($savedata)->save();

        return redirect('/tasks')->with('message','タスクが完了しました');
    }

    public function detail(int $task_id){
        $task = Task::find($task_id);
        if(is_null($task)){
            abort(404);
        }
        $this->authorize('view',$task);
        return view('tasks.detail',['task'=>$task]);
    }

    public function showDeleteForm(int $task_id){
        $task = Task::find($task_id);
        if(is_null($task)){
            abort(404);
        }
        $this->authorize('delete',$task);
        return view('tasks.delete',['task'=>$task]);
    }

    public function destroyTask(int $task_id){
        $deleteTask = Task::find($task_id);
        $this->authorize('delete',$deleteTask);
        $deleteTask -> delete();

        return redirect('/tasks')->with('message','タスクを削除しました');
    }
}
