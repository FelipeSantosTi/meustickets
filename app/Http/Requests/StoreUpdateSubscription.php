<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateSubscription extends FormRequest
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
        $id = $this->segment(3);

        $rules = [
            'title' => ['required', 'string', 'min:3', 'max:191'],
            'resume' => ['nullable', 'string', 'max:10000'],
            'document' => ['nullable', 'file'],
            'coment' => ['nullable', 'string']
        ];

        if ($this->method() == 'PUT') {
            $rules['password'] = ['nullable', 'string', 'min:8', 'confirmed'];
            $rules['event_id'] = '1';
            $rules['title'] = ['nullable', 'string', 'min:3', 'max:191'];
            $rules['resume'] = ['nullable', 'string', 'min:3', 'max:10000'];
            $rules['coment'] = ['nullable', 'string'];
        }

        return $rules;
    }
}
