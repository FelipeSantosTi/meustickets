<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateAccess extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $url = $this->segment(3);

        return [
            'name' => "required|min:3|max:191|unique:accesses,name,{$url},url",
            'description' => 'nullable|min:3|max:191',
        ];
    }
}
