@extends('avored-ecommerce::admin.layouts.app')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Edit Task') }}
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.task.update', $model->id) }}"  method="post">

                        @csrf
                        @method('put')

                        @include('avored-task::task._fields')

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">
                                {{ __('Update') }}
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