<?php

namespace AvoRed\Task\Http\Controllers;

use AvoRed\Task\Http\Requests\TaskFieldRequest;
use AvoRed\Task\Models\Task as TaskModel;
use AvoRed\Task\DataGrid\Task;
use App\Http\Controllers\Controller;
use AvoRed\Ecommerce\Repository\User;

class TaskController extends Controller
{

    /**
     * AvoRed Product Repository.
     *
     * @var \AvoRed\Ecommerce\Repository\User
     */
    protected $userRepository;

    /**
     * Task Station Options List
     *
     *
     */

    protected $statusOptions = ['NOT-STARTED' => 'Not Started Yet', 'IN-PROGRESS' => 'In Progress' ,'DONE' => 'Completed'];

    /**
     * Admin User Controller constructor to Set AvoRed Ecommerce User Repository.
     *
     * @param \AvoRed\Ecommerce\Repository\User $repository
     * @return void
     */
    public function __construct(User $repository)
    {
        $this->userRepository = $repository;
    }


    public function index() {
        $taskGrid = new Task(TaskModel::query()->orderBy('id', 'desc'));

        return view('avored-task::task.index')->with('dataGrid', $taskGrid->dataGrid);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $adminUsers = $this->userRepository->adminUserOptions();

        return view('avored-task::task.create')
            ->with('adminUsers', $adminUsers)
            ->with('statusOptions',$this->statusOptions)
            ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \AvoRed\Task\Http\Requests\TaskFieldRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TaskFieldRequest $request)
    {
        TaskModel::create($request->all());

        return redirect()->route('admin.task.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = TaskModel::find($id);
        $adminUsers = $this->userRepository->adminUserOptions();

        return view('avored-task::task.edit')
            ->with('statusOptions',$this->statusOptions)
            ->with('adminUsers', $adminUsers)
            ->with('model', $task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \AvoRed\Task\Http\Requests\TaskFieldRequest $request
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(TaskFieldRequest $request, $id)
    {
        $task = TaskModel::find($id);

        $task->update($request->all());

        return redirect()->route('admin.task.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TaskModel::destroy($id);

        return redirect()->route('admin.task.index');
    }
}
