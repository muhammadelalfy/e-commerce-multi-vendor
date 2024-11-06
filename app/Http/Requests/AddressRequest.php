<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'addr.billing.first_name' => 'required|string|max:255',
            'addr.billing.last_name' => 'required|string|max:255',
            'addr.billing.email' => 'required|email',
            'addr.billing.phone_number' => 'required|string|max:20',
            'addr.billing.street_address' => 'required|string|max:255',
            'addr.billing.city' => 'required|string|max:255',
            'addr.billing.postal_code' => 'required|string|max:20',
            'addr.billing.country' => 'required|string|size:2', // Assuming ISO country code
            'addr.billing.state' => 'required|string|max:255',
            'addr.shipping.first_name' => 'required|string|max:255',
            'addr.shipping.last_name' => 'required|string|max:255',
            'addr.shipping.email' => 'required|email',
            'addr.shipping.phone_number' => 'required|string|max:20',
            'addr.shipping.street_address' => 'required|string|max:255',
            'addr.shipping.city' => 'required|string|max:255',
            'addr.shipping.postal_code' => 'required|string|max:20',
            'addr.shipping.country' => 'required|string|size:2', // Assuming ISO country code
            'addr.shipping.state' => 'required|string|max:255',
            'shipping' => 'nullable|in:on', // Optional checkbox
        ];
    }

    /**
     * Custom error messages for validation.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'addr.billing.first_name.required' => 'Billing first name is required.',
            'addr.shipping.email.email' => 'Please provide a valid email for shipping.',
        ];
    }
}
