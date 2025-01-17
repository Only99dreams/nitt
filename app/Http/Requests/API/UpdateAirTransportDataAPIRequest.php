<?php

namespace App\Http\Requests\API;

use App\Models\AirTransportData;
use InfyOm\Generator\Request\APIRequest;

class UpdateAirTransportDataAPIRequest extends APIRequest
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
        $rules = AirTransportData::$rules;
        $rules['year'] = $rules['year'] . "," . $this->route("air_transport_datum");

        return $rules;
    }
}
