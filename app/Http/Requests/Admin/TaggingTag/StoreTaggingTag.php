<?php

namespace App\Http\Requests\Admin\TaggingTag;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreTaggingTag extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.tagging-tag.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'slug' => ['required', Rule::unique('tagging_tags', 'slug'), 'string'],
            'name' => ['required', 'string'],
            // 'suggest' => ['required', 'boolean'],
            // 'count' => ['required', 'integer'],
            // 'tag_group_id' => ['nullable', 'integer'],
            'description' => ['nullable', 'string'],
            
        ];
    }

    /**
    * Modify input data
    *
    * @return array
    */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();

        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
