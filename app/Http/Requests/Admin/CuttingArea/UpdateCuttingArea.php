<?php

namespace App\Http\Requests\Admin\CuttingArea;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateCuttingArea extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.cutting-area.edit', $this->cuttingArea);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'avrg_increase' => ['sometimes', 'integer'],
            'cutting_turnover' => ['sometimes', 'integer'],
            'first_age' => ['sometimes', 'integer'],
            'ripeness' => ['sometimes', 'integer'],
            'second_age' => ['sometimes', 'integer'],
            'substance' => ['sometimes', 'integer'],
            'wood_specie_id' => ['sometimes', Rule::unique('cutting_area', 'wood_specie_id')->ignore($this->cuttingArea->getKey(), $this->cuttingArea->getKeyName()), 'string'],
            
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
