<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProduksiRequest extends FormRequest
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
            'kebun_id' => 'required',
            'jumlah_tandan' => 'required|integer',
            'berat_total' => 'required|integer',
            'tanggal_produksi' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'kebun_id.required' => 'Kebun Harus Dipilih',
            'jumlah_tandan.required' => 'Jumlah tandan harus diisi',
            'jumlah_tandan.integer' => 'Jumlah tandan harus berupa angka',
            'berat_total.required' => 'Berat total harus diisi',
            'berat_total.integer' => 'Berat total harus berupa angka',
            'tanggal_produksi.required' => 'Tanggal panen harus diisi'
        ];
    }
}
