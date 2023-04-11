<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTransactionsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            // 'description' => 'required',
            // 'purchase_value' => 'required',
            // 'sale_value' => 'required',
            // 'initial_date' => 'required',
            // 'final_date' => 'required',
        ];
    }

    public function messages()
    {
        return [
            // 'description.required' => 'Você deve informar uma descrição para esta transação.',
            // 'purchase_value.required' => 'Você deve informar um valor de compra para esta transação.',
            // 'sale_value.required' => 'Você deve informar um valor de venda para esta transação.',
            // 'initial_date.required' => 'Você deve informar uma data inicial para esta transação.',
            // 'final_date.required' => 'Você deve informar uma data final para esta transação.',
        ];
    }
}
