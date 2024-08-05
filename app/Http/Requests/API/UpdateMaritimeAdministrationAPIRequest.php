<?php

namespace App\Http\Requests\API;

use App\Models\MaritimeAdministration;
use InfyOm\Generator\Request\APIRequest;

class UpdateMaritimeAdministrationAPIRequest extends APIRequest
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
        $rules = MaritimeAdministration::$rules;
        $rules['year'] = $rules['year'].",".$this->route("maritime_administration");

        return $rules;
    }
}
