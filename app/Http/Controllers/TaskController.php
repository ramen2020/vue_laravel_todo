<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function __construct()
    {
        $this->label = config('data.category_label');
    }
    /**
     * taskデータを全取得
     *
     * @return json
     */
    public function index()
    {
        $data = [
            Task::all(),
            $this->label,
        ];

        return $data;
    }

    /**
     * IDの降順に並べる
     *
     * @return json
     */
    public function sortTasksById($id_flg)
    {
        if ($id_flg === '2') {
            return Task::orderby('id', "DESC")->get();
        } else {
            return Task::orderby('id', "ASC")->get();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存
     *
     * @param  \Illuminate\Http\Request  $request
     * @return
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required|min:1|max:4',
            'title' => 'required|min:5|max:50',
            'content' => 'required|min:5|max:300',
        ]);

        return Task::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return json
     */
    public function show(Task $task)
    {
        return [$task, $this->label];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 更新
     *
     * @param  \Illuminate\Http\Request  $request
     * @param json
     * @return json
     */
    public function update(Request $request, Task $task)
    {
        $this->validate($request, [
            'category_id' => 'required|min:1|max:4',
            'title' => 'required|min:5|max:50',
            'content' => 'required|min:5|max:300',
        ]);

        $task->update($request->all());

        return $task;
    }

    /**
     * 削除
     *
     * @param  int  $id
     * @return void
     */
    public function destroy($id)
    {
        Task::where('id', $id)->delete();
    }

    /**
     * category_idからtaskを取得
     *
     * @param int $category_id
     * @return json
     */
    public function getTaskByCategoryId($category_id)
    {
        $tasks = Task::where('category_id', $category_id)->get();
        return $tasks;
    }
}
