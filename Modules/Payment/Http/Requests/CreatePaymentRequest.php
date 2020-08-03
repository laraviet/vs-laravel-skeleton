<?php

namespace Modules\Payment\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Payment\Entities\Payment;

class CreatePaymentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'order_id' => 'required|exists:orders,id',
            'status'   => 'required|in:' . implode(',', [Payment::STATUS_PAID, Payment::STATUS_PENDING]),
            'price'    => 'required',
            'comment'  => 'nullable|string|min:0|max:255'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
