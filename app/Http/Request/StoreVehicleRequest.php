<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class StoreVehicleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // private $no_reg;

    // public function __construct($no_reg)
    // {
    //     $this->no_reg = $no_reg;
    // }

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
        return [
            //
            'no_reg' => 'required|unique:vehicles',
            'tahun' => 'required|numeric|digits:4|min:1900|max:'.date('Y')+1,
            'nama_pemilik' => 'required|string|max:255',
            'silinder' => 'required|numeric',
            'bahan_bakar' => 'required|string',
            'merk' => 'required|string',
            'warna' => 'required|string',
            'alamat' => 'required|string',
        ];
    }
}
