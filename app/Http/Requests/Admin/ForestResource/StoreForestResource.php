<?php

namespace App\Http\Requests\Admin\ForestResource;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreForestResource extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.forest-resource.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'bonitet_id' => ['required', 'integer'],
            'forest_fund' => ['required', 'integer'],
            'timber_class_id' => ['required', 'integer'],
            'wood_stock' => ['required', 'integer'],
            'woodSpecie' => ['required'],

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

    public function getWoodSpecieId(){
        if ($this->has('woodSpecie')){
            return $this->get('woodSpecie')['id'];
        }
        return null;
    }
}
