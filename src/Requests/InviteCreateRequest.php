<?php

namespace Blixx\Invite\Requests;

use Blixx\Invite\Controllers\InviteUseController;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class InviteUseRequest
 * @package Blixx\Invite\Requests
 * @see InviteUseController
 */
class InviteCreateRequest extends FormRequest
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

        return [

            'email'=>'required|email',
            'first_name'=>'required|string',

        ];

    }
}
