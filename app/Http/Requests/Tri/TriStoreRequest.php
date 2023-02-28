<?php

namespace App\Http\Requests\Tri;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class TriStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        if (Gate::allows('isOwner')) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'nama' => ['required', 'min:5', 'max:50', 'unique:indosat'],
            'masa_aktif' => ['required', 'min:5', 'max:50'],
            'kategori' => ['required', 'min:5', 'max:50'],
            'harga_asli' => ['required', 'min:3', 'max:11'],
            'harga_jual' => ['required', 'min:3', 'max:11'],
        ];
    }

    public function make()
    {
        return auth()->user()->tri()->create([
            'nama' => $this->nama,
            'slug' => strtolower(str_replace(' ', '-', $this->nama)),
            'masa_aktif' => $this->masa_aktif,
            'kategori' => $this->kategori,
            'harga_asli' => $this->harga_asli,
            'harga_jual' => $this->harga_jual,
        ]);
    }
}