<?php

namespace App\Http\Requests\Admin\CuttingArea;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreCuttingArea extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.cutting-area.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'avrg_increase' => ['required', 'integer'],
            'cutting_turnover' => ['required', 'integer'],
            'first_age' => ['required', 'integer'],
            'ripeness' => ['required', 'integer'],
            'second_age' => ['required', 'integer'],
            'substance' => ['required', 'integer'],
            'wood_specie_id' => ['required', Rule::unique('cutting_area', 'wood_specie_id'), 'string'],
            
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
