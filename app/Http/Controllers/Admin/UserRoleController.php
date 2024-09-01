<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, User $user)
    {
        $data = $request->validate([
            'roles' => 'required|array',
            'roles.*' => 'sometimes|string|exists:App\Models\Role,name',
        ]);

        $user->syncRoles($data['roles']);

        return redirect()
            ->back(fallback: route('admin.users.edit', $user))
            ->with('success', 'نقش های کاربر با موفقیت ثبت شد.');
    }
}
