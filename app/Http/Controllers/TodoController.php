<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /*
    |----------------------------------
    =======GET TODO LIST========
    |----------------------------------
    */
    public function index()
    {
        $todos = Todo::paginate(4);
        return view('todolist',compact('todos'));
    }

    // ======SAVE TASK=========
    public function saveTask(){
        $this->validate(request(),[
            'name'=>'required|min:4',
            'task'=>'required|min:6'
        ]);

        Todo::create([
            'name'=>request('name'),
            'task' =>request('task')
        ]);
        return redirect()->back()->with('success','Task Created!');
    }

    // ===CHANGE STATUS OF TASK=======
    public function changeStatus($id,$status)
    {
        if($id !=null && $status != null){
            $todo = Todo::find($id);
            $todo->update([
                'status'=>$status
            ]);
            return redirect()->back();

        }else{
            return 'Something is wrong';
        }
    }
    // ========EDIT SHOW========
    public function editShow($id)
    {
        $task = Todo::find($id);
        return view('edit',compact('task'));

    }

    // =======SAVE DATA========
    public function editSave($id)
    {
        $this->validate(request(),[
            'name'=>'required|min:4',
            'task'=>'required|min:6'
        ]);

        $task = Todo::find($id);
        $task->update([
            'name' => request('name'),
            'task' => request('task')
        ]);
        return redirect()->route('todolist')->with('success','Edit Success!!');
    }

    public function delete($id)
    {
        Todo::find($id)->delete();
        return redirect()->route('todolist')->with('success','Data Deleted!!');

    }
}
