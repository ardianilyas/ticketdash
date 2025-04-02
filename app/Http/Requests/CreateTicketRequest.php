<?php

namespace App\Http\Requests;

use App\Enums\StatusEnum;
use App\Enums\PriorityEnum;
use Illuminate\Foundation\Http\FormRequest;

class CreateTicketRequest extends FormRequest
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
            'title' => 'required|string|min:8',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'priority' => 'required|in:'. implode(',', PriorityEnum::values()),
        ];
    }

    public function attributes()
    {
        return [
            'category_id' => 'category'
        ];
    }
}
