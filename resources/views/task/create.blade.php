@extends('avored-ecommerce::admin.layouts.app')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Create Task') }}
                </div>
                <div class="card-body">

                    <form action="{{ route('admin.task.store') }}" method="post">
                        @csrf

                        @include('avored-task::task._fields')

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">
                                {{ __('Create Task') }}
                            </button>
                            <a href="{{ route('admin.admin-user.index') }}" class="btn">
                                {{ __('avored-ecommerce::lang.cancel') }}
                            </a>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection