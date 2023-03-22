<?php

namespace Moka\ProcessingSync\Http\Requests;

use App\Enums\UserBalance\UserBalanceOperationEnum;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class TransactionRequest extends FormRequest
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
            'client_id' => 'required|numeric',
            'amount' => 'required|numeric',
            'operation' => [
                'required',
                Rule::in([UserBalanceOperationEnum::ADD->value, UserBalanceOperationEnum::MINUS->value]),
            ],
            'status' => [
                'required'
            ],
            'comment' => 'max:191',
            'type_of_space' => 'required|string',
            'type_of_space_item_id' => 'required|numeric',
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
