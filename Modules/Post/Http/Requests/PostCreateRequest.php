<?php

namespace Modules\Post\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'postTitle'=>'required',
            'postContent'=>'required',
            'postTags'=>'required'
        ];
    }

    public function messages()
    {
        return [
             'postTitle.required'=>trans('post::message.postTitle_required'),
             'postContent.required'=>trans('post::message.postContent_required'),
             'postTags.required'=>trans('post::message.postTags_required'),

        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
