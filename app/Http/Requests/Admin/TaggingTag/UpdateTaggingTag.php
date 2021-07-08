<?php

namespace App\Http\Requests\Admin\TaggingTag;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateTaggingTag extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.tagging-tag.edit', $this->taggingTag);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'slug' => ['sometimes', Rule::unique('tagging_tags', 'slug')->ignore($this->taggingTag->getKey(), $this->taggingTag->getKeyName()), 'string'],
            'name' => ['sometimes', 'string'],
            // 'suggest' => ['sometimes', 'boolean'],
            // 'count' => ['sometimes', 'integer'],
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
