<?php

namespace App\Http\Requests;

class QueryPatientMeasurementRequest extends Request
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'patient_id' => 'required|int|exists:App\Models\Patient,id|exists:App\Models\User,id,deleted_at,NULL',
		];
	}

	public function validationData()
	{
		return array_merge($this->all(), $this->route()->parameters());
	}
}
