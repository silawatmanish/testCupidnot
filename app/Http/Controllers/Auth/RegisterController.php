<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'date_of_birth' => ['required'],
            'gender' => ['required'],
            'annual_income' => ['required'],
            'occupation' => ['required'],
            'family_type' => ['required'],
            'Manglik' => ['required'],
            'preference_occupation' => ['required'],
            'preference_family_type' => ['required'],
            'preference_manglik' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $preferenceOccupationString = implode(',', $data['preference_occupation']);
        $preferenceFamilyTypeString = implode(',', $data['preference_family_type']);

        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'google_id' => $data['google_id'],
            'date_of_birth' => date('Y-m-d', strtotime($data['date_of_birth'])),
            'age' => $data['age'],
            'gender' => $data['gender'],
            'annual_income' => $data['annual_income'],
            'occupation' => $data['occupation'],
            'family_type' => $data['family_type'],
            'Manglik' => $data['Manglik'],
            'preference_occupation' => $preferenceOccupationString,
            'preference_family_type' => $preferenceFamilyTypeString,
            'preference_manglik' => $data['preference_manglik'],
            'preference_expected_income_min' => $data['preference_expected_income_min'],
            'preference_expected_income_max' => $data['preference_expected_income_max'],
        ]);
    }
}