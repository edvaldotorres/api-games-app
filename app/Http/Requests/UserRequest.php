<?php

namespace App\Http\Requests;

use App\Enums\UserType;

class UserRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $return = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'is_admin' => 'required|in:0,1',
        ];

        if (
            $this->route()->uri == 'api/register' ||
            ($this->route()->uri == 'api/users/{id}' && auth('api')->user()->is_admin != UserType::ADMIN)
        ) {
            unset($return['is_admin']);
        }

        if ($this->route()->uri == 'api/users/{id}') {
            $return['name'] = 'string|max:255';
            $return['email'] = 'string|email|max:255';
            $return['password'] = 'string|min:6';
            if (auth('api')->user()->is_admin)
                $return['is_admin'] = 'in:0,1';
        }

        return $return;
    }
}
