<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class SolutionsStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title'=>'required',
            'description'=>'required',
            'solution'=>'required',
            'image'=>'nullable',
            'active'=>'required',
            'files' => 'nullable'
        ];
    }

    protected function prepareForValidation()
    {
        gettype($this->request->get('active'))==='boolean' ?
            $this->merge(['active' => $this->request->get('active') === true ? 1 : 0,])
            :
            $this->merge(['active' => $this->request->get('active') === "true" ? 1 : 0,]);
    }
}
