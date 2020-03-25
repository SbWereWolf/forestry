<?php

namespace App\Http\Requests\Admin\WoodSpecie;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreWoodSpecie extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.wood-specie.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'calculation_period' => ['required', 'integer'],
            'main_harvesting_age' => ['required', 'integer'],
            'timber_harvesting_age' => ['required', 'integer'],
            'title' => ['required', Rule::unique('wood_specie', 'title'), 'string'],

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
