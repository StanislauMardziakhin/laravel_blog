<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'required|image',
            'main_image' => 'required|image',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Поле обязательно для заполнения',
            'title.string' => 'Данные должны соответствовать строковому типу',
            'content.required' => 'Поле обязательно для заполнения',
            'content.string' => 'Данные должны соответствовать строковому типу',
            'preview_image.required' => 'Поле обязательно для заполнения',
            'preview_image.file' => 'Необходимо выбрать файл',
            'main_image.required' => 'Поле обязательно для заполнения',
            'main_image.file' => 'Необходимо выбрать файл',
            'category_id.required' => 'Поле обязательно для заполнения',
            'category_id.integer' => 'Идентификатор категории должен иметь числовое значение',
            'category_id.exists' => 'Идентификатор категории должен находиться в базе данных',
            'tag_ids.array' => 'Необходимо отправить массив данных',
        ];
    }
}
