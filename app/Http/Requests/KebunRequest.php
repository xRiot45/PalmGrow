<?php

namespace App\Http\Requests;

use App\Enums\StatusKebun;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class KebunRequest extends FormRequest
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
            'lokasi' => 'required|string',
            'luas' => 'required|integer',
            'status' => ['required', Rule::in(StatusKebun::values())],
            'tanggal_tanam' => 'required',
            'tanggal_panen' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'lokasi.required' => 'Lokasi kebun harus diisi.',
            'lokasi.string' => 'Lokasi kebun harus berupa teks.',
            'luas.required' => 'Luas kebun harus diisi.',
            'luas.integer' => 'Luas kebun harus berupa angka.',
            'status.required' => 'Status kebun harus dipilih.',
            'status.in' => 'Status kebun yang dipilih tidak valid.',
            'tanggal_tanam.required' => 'Tanggal tanam harus diisi.',
            'tanggal_panen.required' => 'Tanggal panen harus diisi.',
        ];
    }
}
