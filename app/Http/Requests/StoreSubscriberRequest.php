<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubscriberRequest extends FormRequest
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
    public function rules()
    {
        return [
            'user_id' => 'required|unique:subscribers,user_id|exists:users,id',
            'website_id' => 'required|exists:websites,id',
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'The user does not exist in the portal',
            'website_id.required' => 'The website does not exist in the portal',

        ];
    }

    public function response(array $errors) {

        // Put whatever response you want here.
        return new JsonResponse([
            'status' => '422',
            'errors' => $errors,
        ], 422);
    }
}
