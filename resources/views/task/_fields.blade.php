

@include('avored-ecommerce::forms.text',['name' => 'title','label' => __('Title')])

@include('avored-ecommerce::forms.textarea',['name' => 'content',
                                            'label' => __('Content'),
                                            'attributes' => ['class' => 'summernote']
                                            ]
                                            )

@php
    $date = (isset($model) && $model->due_date != null) ?? $model->due_date->format('yy/m/d');
@endphp
@include('avored-ecommerce::forms.text',['name' => 'due',
                                        'label' => __('Due Date'),
                                        'attributes' => [
                                                            'data-value' => "{{ $date }}",
                                                            'class' => 'form-control pickadate',

                                                        ]])

@include('avored-ecommerce::forms.select',['name' => 'status','label' => __('Status'),'options' => $statusOptions])

@include('avored-ecommerce::forms.select',['name' => 'admin_user_id','label' => __('Assigned to User'),'options' => $adminUsers])



@push('styles')
    <style>
        .pickadate[readonly] {
            background-color: #fff;
        }
    </style>
@endpush
@push('scripts')

    <script>

        $('.summernote').summernote({});

        $('.pickadate').pickadate({
            format: 'd mmmm, yyyy',
            formatSubmit: 'yyyy-mm-dd',
            hiddenSuffix: '_date',
            hiddenName: true
        });

    </script>


@endpush