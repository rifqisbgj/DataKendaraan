<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreVehicleRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'tahun' => ['nullable','numeric','digits:4','min:1900','max:'.date('Y')+1],
            'nama_pemilik' => ['required','string','max:255'],
            'silinder' => ['nullable','numeric'],
            'bahan_bakar' => ['nullable','string'],
            'merk' => ['nullable','string'],
            'warna' => ['nullable','string'],
            'alamat' => ['nullable','string'],
        ];

        if ($this->getMethod() == "POST") {
            $rules += [
                'no_reg' => ['required','unique:vehicles'],
            ];
        }

        if ($this->getMethod() == "PUT") {
            $rules += [
                'no_reg' => ['required',Rule::unique('vehicles')->ignore($this->vehicle)],
            ];
        }

        return $rules;
    }
}
