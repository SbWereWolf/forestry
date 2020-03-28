<?php

namespace App\Http\Requests\Admin\ForestryIndicator;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreForestryIndicator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.forestry-indicator.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'avrg_bonitet' => ['required', 'integer'],
            'avrg_class' => ['required', 'integer'],
            'avrg_increase' => ['required', 'integer'],
            'avrg_volume' => ['required', 'integer'],
            'economical_section_high' => ['required', 'integer'],
            'economical_section_low' => ['required', 'integer'],
            'operational_fund' => ['required', 'integer'],
            'operational_volume' => ['required', 'integer'],
            'wood_specie_id' => ['required', Rule::unique('forestry_indicator', 'wood_specie_id'), 'string'],
            
        ];
    }

    /**
    * Modify input data
    *
    * @return array
    */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();

        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
