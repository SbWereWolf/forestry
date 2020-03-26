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
            'forest_fund' => ['required', 'integer'],
            'wood_stock' => ['required', 'integer'],
            'woodSpecie' => ['required'],
            'timberClass' => ['required'],
            'bonitet' => ['required'],

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
    public function getTimberClassId(){
        if ($this->has('timberClass')){
            return $this->get('timberClass')['id'];
        }
        return null;
    }
    public function getBonitetId(){
        if ($this->has('bonitet')){
            return $this->get('bonitet')['id'];
        }
        return null;
    }
}
