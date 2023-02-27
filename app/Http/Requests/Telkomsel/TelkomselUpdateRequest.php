<?php

namespace App\Http\Requests\Telkomsel;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class TelkomselUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
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
            'nama' => ['required', 'min:5', 'max:50'],
            'masa_aktif' => ['required', 'min:5', 'max:50'],
            'kategori' => ['required', 'min:5', 'max:50'],
            'harga_asli' => ['required', 'min:3', 'max:11'],
            'harga_jual' => ['required', 'min:3', 'max:11'],
        ];
    }
}
