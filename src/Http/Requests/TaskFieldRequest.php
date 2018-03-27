<?php
namespace AvoRed\Task\Http\Requests;

use Illuminate\Foundation\Http\FormRequest as Request;
use Illuminate\Support\Facades\Auth;

class TaskFieldRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $validation['title']    = 'required';
        $validation['content']  = 'required';
        $validation['status']   = 'required';

        return $validation;

    }
}
