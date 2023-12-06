<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\Return_;

class TaskController extends Controller
{

    //view task
    public function list()
    {
        $categories = Category::latest()->get();  
        $data = Task::where('user_id', Auth::id())->latest()->get();
        return view('task', ['tasks' => $data,'categories'=>$categories]);
    }


    //single task
    public function single($id){
        $task = Task::where('id',$id)->first();
        return view('task-single',['task'=>$task]);
    }


    //create task
    public function create(Request $request)
    {
        $user = User::where('id', Auth::id())->first();
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'category'=> 'required',
            'description' => 'required|string',
            'due_date' => 'required|date'
        ]);

        if ($validator->fails()) {
            return redirect('task/create')->withErrors($validator)->withInput();
        }

        $task = [
            'title' => $request->title,
            'category_id'=> $request->category,
            'description' => $request->description,
            'due_date' => $request->due_date
        ];

        $user->task()->create($task);

        return redirect('task/list');
        
    }

    

    //update task
    public function update(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string',
            'category'=> 'nullable',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date'
        ]);

        if ($validator->fails()) {
            return redirect('task/list')->withErrors($validator)->withInput();
        }

        $task = Task::findOrFail($id);
        $temp = [];
        $datas = [
            'title',
            'category_id',
            'description',
            'due_date'
        ];

        foreach ($datas as $data){
            if($request->filled($data)){
                $temp[$data] = $request->input($data);
            }
        }

        $task->update($temp);

        return redirect('task/list');
    }


    //delete task
    public function delete($id){
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect('task/list');
    }
}
