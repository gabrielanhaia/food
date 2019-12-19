<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CreateCollectRequest
 * @package App\Http\Requests\Api\V1
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class CreateCollectRequest extends FormRequest
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
            'products' => 'nullable|array',
            'description' => 'string',
            'name_responsible' => 'string|required',
            'collection_start_time' => 'required|date_format:Y-m-d H:i:s',
            'collection_end_time' => 'required|date_format:Y-m-d H:i:s',
            'quantity' => 'integer|required',
            'unit_of_measurement' => 'string|required|in:g,L,m,c'
        ];
    }
}
