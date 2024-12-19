<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PembayaranRequest extends FormRequest
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
        if ($this->isMethod('POST')) {
            return [
                'produksi_id' => 'required',
                'jumlah_pembayaran' => 'required|integer',
                'tanggal_pembayaran' => 'required',
                'metode_pembayaran' => 'required|string',
                'bukti_pembayaran' => 'required|mimes:png,jpg,jpeg|max:2048',
            ];
        }

        if ($this->isMethod('PUT')) {
            return [
                'produksi_id' => 'required',
                'jumlah_pembayaran' => 'required|integer',
                'tanggal_pembayaran' => 'required',
                'metode_pembayaran' => 'required|string',
                'bukti_pembayaran' => 'nullable',
            ];
        }

        return [];
    }

    public function messages(): array
    {
        return [
            'produksi_id.required' => 'Produksi Harus Dipilih',
            'jumlah_pembayaran.required' => 'Jumlah pembayaran harus diisi',
            'jumlah_pembayaran.integer' => 'Jumlah pembayaran harus berupa angka',
            'tanggal_pembayaran.required' => 'Tanggal pembayaran harus diisi',
            'metode_pembayaran.required' => 'Metode pembayaran harus diisi',
            'metode_pembayaran.string' => 'Metode pembayaran harus berupa string',
            'bukti_pembayaran.required' => 'Bukti pembayaran harus diisi',
            'bukti_pembayaran.optional' => 'Bukti pembayaran bersifat opsional',
            'bukti_pembayaran.mimes' => 'Bukti pembayaran harus berupa png, jpg, atau jpeg',
            'bukti_pembayaran.max' => 'Bukti pembayaran tidak boleh lebih dari 2MB',
        ];
    }
}
