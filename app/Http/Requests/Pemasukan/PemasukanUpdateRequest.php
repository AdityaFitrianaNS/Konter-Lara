<?php

namespace App\Http\Requests\Pemasukan;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class PemasukanUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (Gate::allows('isOwner') || Gate::allows('isEmployee')) {
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
            'harga' => ['required', 'min:3', 'max:11'],
            'jumlah' => ['required', 'min:1', 'max:11'],
            'total' => ['required', 'min:3', 'max:11'],
            'bayar' => ['required', 'min:3', 'max:11'],
            'kembalian' => ['required', 'min:3', 'max:11'],
        ];
    }
}
