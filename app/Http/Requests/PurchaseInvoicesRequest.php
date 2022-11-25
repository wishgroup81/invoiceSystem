<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseInvoicesRequest extends BaseFormRequest
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
        return [
            'code'=>'required|unique:invoices',
            'supplier_id'=>'required|exists:suppliers,id',
            // 'product_id'=>'required|exists:products,id',
            // 'amount'=>'required|gt:0'

        ];
    }
}
