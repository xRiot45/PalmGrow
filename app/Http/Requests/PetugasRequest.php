<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PetugasRequest extends FormRequest
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
            'pengguna_id' => 'required|unique:petugas,pengguna_id,null,id',
            'nama_petugas' => 'required|string',
            'jabatan' => 'required|string',
            'tanggal_bergabung' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'pengguna_id.required' => 'Pengguna harus dipilih.',
            'pengguna_id.unique' => 'Pengguna sudah dipilih.',
            'nama_petugas.required' => 'Nama petugas harus diisi.',
            'nama_petugas.string' => 'Nama petugas harus berupa teks.',
            'jabatan.required' => 'Jabatan harus diisi.',
            'jabatan.string' => 'Jabatan harus berupa teks.',
            'tanggal_bergabung.required' => 'Tanggal bergabung harus diisi.',
        ];
    }
}
