<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class DistribusiRequest extends FormRequest
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
            'produksi_id' => 'required|exists:produksi,id',
            'tujuan' => 'required|string',
            'jumlah' => 'required|integer',
            'tanggal_distribusi' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'produksi_id.required' => 'Produksi Harus Dipilih',
            'produksi_id.exists' => 'Produksi yang dipilih tidak valid',
            'tujuan.required' => 'Tujuan harus diisi',
            'tujuan.string' => 'Tujuan harus berupa teks',
            'jumlah.required' => 'Jumlah harus diisi',
            'jumlah.integer' => 'Jumlah harus berupa angka',
            'tanggal_distribusi.required' => 'Tanggal distribusi harus diisi',
        ];
    }
}
