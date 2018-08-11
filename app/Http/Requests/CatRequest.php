<?php

namespace Furbook\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class CatRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        switch ($this->method()) {
            case 'PUT':
            case 'PATCH':
                $cat = $this->route('cat');
                if(Auth::user()->canEdit($cat)){
                    return true;
                }
                return false;
            default:
                return true;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $cat = $this->route('cat');
        //dd($catId);
        return [
            'name' => 'required|max:255|unique:cats,name,' . $cat->id,
                'date_of_birth' => 'required|date:"YY-mm-dd"',
                'breed_id' => 'required|numeric'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'Cột :attribute là bắt buộc.'
        ];
    }
}
