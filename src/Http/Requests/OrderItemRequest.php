<?php

namespace Moka\ProcessingSync\Http\Requests;

use App\Enums\UserBalance\UserBalanceOperationEnum;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class OrderItemRequest extends FormRequest
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
     * @return array
     */
    public function rules(): array
    {
        return [
            'order_id' => 'required|numeric',
            'product_id' => 'required|numeric',
            'to' => 'required|numeric',
            'amount' => 'required|numeric',
            'total' => 'required|numeric',
            'markup_type' => 'required',
            'markup_value' => 'required',
            'supplier_id' => 'required',
            'supplier_external_id' => 'required',
            'supplier_code' => 'required',
            'reserved_at' => 'required',
            'status' => 'required',
            'comment' => 'max:191',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => $errors,
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }
}
