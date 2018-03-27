@extends('avored-ecommerce::admin.layouts.app')

@section('content')
    <div class="container">
        <div class="h1">
            {{ __('Task List') }}

                <a href="{{ route('admin.task.create') }}"
                   class="float-right btn btn-primary">
                    {{ __('Create Task') }}
                </a>

        </div>
        {!! DataGrid::render($dataGrid) !!}
    </div>
@stop
