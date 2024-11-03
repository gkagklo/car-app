<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarStoreRequest extends FormRequest
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
            'maker_id' => 'required',
            'model_id' => 'required',
            'year' => 'required',
            'car_type_id' => 'required',
            'price' => 'required',
            'vin' => 'required',
            'mileage' => 'required',
            'fuel_type_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'user_id' => 'required',
            'description' => 'nullable',
            'images' => 'required|array',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
}
