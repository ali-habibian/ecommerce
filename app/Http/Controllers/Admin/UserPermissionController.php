<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserPermissionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, User $user)
    {
        $data = $request->validate([
            'permissions' => 'required|array',
            'permissions.*' => 'sometimes|string|exists:Spatie\Permission\Models\Permission,name'
        ]);

        $user->syncPermissions($data['permissions']);

        return redirect()
            ->back(fallback: route('admin.users.edit', $user))
            ->with('success', 'مجوز های کاربر با موفقیت ذخیره شدند.');
    }
}
