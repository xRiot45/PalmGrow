<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LaporanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()?->role?->value === 'Admin' || Auth::user()?->role?->value === 'Petugas Kebun';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if ($this->isMethod('POST')) {
            return [
                'kebun_id' => 'required|exists:kebun,id',
                'file_path' => 'required|mimes:pdf|max:2048',
                'tanggal_laporan' => 'required',
            ];
        }

        if ($this->isMethod('PUT')) {
            return [
                'kebun_id' => 'required|exists:kebun,id',
                'file_path' => 'nullable',
                'tanggal_laporan' => 'required',
            ];
        }

        return [];
    }

    public function messages(): array
    {
        return [
            'kebun_id.required' => 'Kebun harus dipilih',
            'file_path.required' => 'File harus diunggah pada saat pembuatan laporan',
            'file_path.mimes' => 'File harus berupa PDF',
            'file_path.max' => 'File tidak boleh lebih dari 2MB',
            'tanggal_laporan.required' => 'Tanggal laporan harus diisi',
            'file_path.nullable' => 'File bersifat opsional saat mengupdate laporan',
        ];
    }
}
