<?php

namespace App\Http\Requests\Admin\ForestResource;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateForestResource extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.forest-resource.edit', $this->forestResource);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'forest_fund' => ['sometimes', 'integer'],
            'wood_stock' => ['sometimes', 'integer'],
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
    public function getBonitetId(){
        $has = $this->has('bonitet');
        if ($has){
            return $this->get('bonitet')['id'];
        }
        return null;
    }
}
