<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AksesorisRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'nama' => ['required', 'min:5', 'max:50', 'unique:aksesoris'],
            'merk' => ['required', 'min:5', 'max:50'],
            'kategori' => ['required', 'min:5', 'max:50'],
            'harga_asli' => ['required', 'max:11'],
            'harga_jual' => ['required', 'max:11'],
        ];
    }

    public function make()
    {
        return auth()->user()->aksesoris()->create([
            'nama' => $this->nama,
            'slug' => strtolower(str_replace(' ', '-', $this->nama)),
            'merk' => $this->merk,
            'kategori' => $this->kategori,
            'harga_asli' => $this->harga_asli,
            'harga_jual' => $this->harga_jual,
        ]);
    }
}
