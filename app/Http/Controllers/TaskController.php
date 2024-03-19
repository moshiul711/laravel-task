<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public $tasks,$task;
    public function index()
    {
        $this->tasks = Task::with('tags')->get();
        return view('task.index',['tasks'=>$this->tasks]);
    }

    public function storeTask(Request $request)
    {
        $rules = [
            'title' => 'required|max:255',
            'description' => 'required',
            'tags' => 'required|array',
            'tags.*' => 'exists:tags,id',
        ];
        $messages = [
            'tags.*.exists' => 'Invalid tag selected.',
        ];
        $request->validate($rules, $messages);

        $task = Task::create($request->all());
        $task->tags()->sync($request->tags);
        return back()->with('success','Task Added Successfully');
    }

    public function taskEdit($id)
    {
        $this->task = Task::with('tags')->find($id);
        $tags = Tag::with('tasks')->get();
        return view('task.edit',[
            'task'=>$this->task,
            'tags' => $tags
        ]);
    }

    public function taskUpdate(Request $request, $id)
    {
        $rules = [
            'title' => 'required|max:255',
            'description' => 'required',
            'tags' => 'required|array',
            'tags.*' => 'exists:tags,id',
        ];
        $messages = [
            'tags.*.exists' => 'Invalid tag selected.',
        ];
        $request->validate($rules, $messages);
        $task = Task::find($id);
        $task_update = Task::find($id)->update($request->all());
        if ($task)
        {
            $task->tags()->sync($request->tags);
        }
        return redirect('/')->with('success','Task Updated Successfully');
    }

    public function taskDelete($id)
    {
        $task = Task::find($id)->delete();
        return redirect('/')->with('success','Task Deleted Successfully');
    }

    public function taskFilter(Request $request)
    {
        $tag = Tag::with('tasks')->find($request->tag_id);
        // return redirect('/task-filter')->with(['tag'=>$tag])
        return view('task.filter',['tag'=>$tag]);
    }

}
