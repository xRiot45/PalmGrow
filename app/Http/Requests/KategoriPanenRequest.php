<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class KategoriPanenRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->role->value === 'Admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama_kategori' => 'required|max:100',
            'deskripsi' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'nama_kategori.required' => 'Nama kategori harus diisi',
            'nama_kategori.max' => 'Maksimal 100 karakter',
            'deskripsi.required' => 'Deskripsi harus diisi',
        ];
    }
}
