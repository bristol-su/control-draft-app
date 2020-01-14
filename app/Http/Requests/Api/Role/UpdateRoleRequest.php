<?php

namespace App\Http\Requests\Api\Role;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
{

    public function rules()
    {
        return [
            'position_id' => 'nullable|integer|exists:control_positions,id',
            'group_id' => 'nullable|integer|exists:control_groups,id',
            'email' => 'nullable|string|email',
            'position_name' => 'nullable|string|max:255',
        ];
    }

}
