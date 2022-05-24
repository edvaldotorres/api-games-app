<?php

namespace App\Http\Requests;

class GameRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_id' => 'required|integer|exists:users,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'score' => 'required|integer|min:0',
        ];
    }
}
