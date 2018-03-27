<?php

namespace AvoRed\Task\DataGrid;

use AvoRed\Framework\DataGrid\Facade as DataGrid;

class Task
{
    public $dataGrid;

    public function __construct($model)
    {
        $dataGrid = DataGrid::make('avored_task_controller');

        $dataGrid->model($model)
                ->column('id', ['sortable' => true])
                ->column('title', ['label' => 'Title'])

                ->linkColumn('admin_user_id', ['label' => 'Assigned To User'], function ($model) {
                    if(null === $model->adminUser) {
                        $name = "";
                    } else {
                        $name = $model->adminUser->full_name;
                    }
                    return $name;
                })
                ->linkColumn('edit', [], function ($model) {
                    return "<a href='".route('admin.task.edit', $model->id)."' >Edit</a>";
                })->linkColumn('destroy', [], function ($model) {
                    return "<form id='admin-task-destroy-".$model->id."'
                                                method='POST'
                                                action='".route('admin.task.destroy', $model->id)."'>
                                            <input name='_method' type='hidden' value='DELETE' />
                                            ".csrf_field()."
                                            <a href='#'
                                                onclick=\"jQuery('#admin-task-destroy-$model->id').submit()\"
                                                >Destroy</a>
                                        </form>";
                });

        $this->dataGrid = $dataGrid;
    }
}
