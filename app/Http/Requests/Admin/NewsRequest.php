<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'image' => 'required|image|mimes:png,jpg,jpeg',
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'Gambar wajib diisi!',
            'title.required' => 'Judul wajib diisi!',
            'content.required' => 'Caption wajib diisi!',
            'category_id.required' => 'Kategori wajib diisi!',
        ];
    }
}
