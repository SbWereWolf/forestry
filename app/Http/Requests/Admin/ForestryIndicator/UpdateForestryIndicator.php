<?php

namespace App\Http\Requests\Admin\ForestryIndicator;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateForestryIndicator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.forestry-indicator.edit', $this->forestryIndicator);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'avrg_bonitet' => ['sometimes', 'integer'],
            'avrg_class' => ['sometimes', 'integer'],
            'avrg_increase' => ['sometimes', 'integer'],
            'avrg_volume' => ['sometimes', 'integer'],
            'economical_section_high' => ['sometimes', 'integer'],
            'economical_section_low' => ['sometimes', 'integer'],
            'operational_fund' => ['sometimes', 'integer'],
            'operational_volume' => ['sometimes', 'integer'],
            'wood_specie_id' => ['sometimes', Rule::unique('forestry_indicator', 'wood_specie_id')->ignore($this->forestryIndicator->getKey(), $this->forestryIndicator->getKeyName()), 'string'],
            
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
