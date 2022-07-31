<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            case 'POST':
            {
                return [
                    'category_name' => 'required|string',
                    'category_code' => 'required|string|unique:categories,category_code',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'category_name' => 'required|string',
                    'category_code' => 'required|string|unique:categories,category_code,'. $this->category_code. ',category_code',
                ];
            }
            default:break;
        }
    }
}
