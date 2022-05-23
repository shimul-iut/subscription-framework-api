<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => 'required|max:255',
            'body' => 'required',
            'website_id' => 'required|exists:websites,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'A title is required for the post',
            'body.required' => 'A message is required for the post',
            'website_id.required' => 'The post needs a website which is available in the portal'
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
