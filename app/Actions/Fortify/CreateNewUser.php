<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Spatie\Permission\Models\Role;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users',
            ],
            'password' => $this->passwordRules(),
            'address' => ['required', 'string', 'max:255'],
            'telephone' => ['required', 'string', 'max:255'],
        ], [
            'name.required' => 'نام و نام خانوادگی الزامی است.',
            'name.string' => 'نام باید شامل حروف باشد.',
            'name.max' => 'نام نمی‌تواند بیشتر از 255 کاراکتر باشد.',

            'email.required' => 'ایمیل الزامی است.',
            'email.email' => 'ایمیل باید یک آدرس ایمیل معتبر باشد.',
            'email.unique' => 'این ایمیل قبلاً ثبت شده است.',

            'password.required' => 'رمز عبور الزامی است.',
            'password.min' => 'رمز عبور باید حداقل ۸ کاراکتر باشد.',
            'password.confirmed' => 'رمز عبور با تاییدیه آن مطابقت ندارد.',

            'address.required' => 'آدرس الزامی است.',
            'telephone.required' => 'شماره تلفن الزامی است.',
        ])->validate();


        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'address' => $input['address'],
            'telephone' => $input['telephone'],
        ]);
        $this->assignRole($user);

        return $user;
    }

    public function assignRole(User $user): void
    {
        $role = Role::findOrCreate('customer');
        $user->assignRole($role);
    }
}
