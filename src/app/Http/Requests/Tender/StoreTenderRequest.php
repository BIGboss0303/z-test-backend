<?php

namespace App\Http\Requests\Tender;

use App\Enums\TenderStatus;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Foundation\Http\FormRequest;

class StoreTenderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        
        return [
            'external_code' => 'required|integer',
            'number' => 'required|string',
            'status' => ['nullable', new Enum(TenderStatus::class)],
            'name' => 'required|string',
            'updated_at' => [
                'required', 
                Rule::date()->format('Y-m-d H:i:s')] ,
        ];
    }
}
