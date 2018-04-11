<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostLoginController extends Controller
{
    public function create() {
        $timezone_list = \DateTimeZone::listIdentifiers();
        $user = auth()->user();

        $default_timezone = config('app.timezone');
        return view('auth.post-login', [
            'name' => $user->name,
            'timezone_list' => array_combine($timezone_list, $timezone_list), 
            'default_timezone' => $default_timezone
        ]);
    }

    public function store(Request $request) {
        $timezone_list = \DateTimeZone::listIdentifiers();
        $validationRules = [
            'timezone' => [
                'required',
                function($attribute, $value, $fail) use ($timezone_list) {
                    if (!in_array($value, $timezone_list)) {
                        return $fail($attribute.' no es valido.');
                    }
                }
            ],
            'name' => 'required|max:100'
        ];

        Validator::make($request->all(), $validationRules)->validate();

        $user = auth()->user();

        $user->name = $request->get('name');
        $user->timezone = $request->get('timezone');
        $user->registration_complete = true;

        $user->save();

        return redirect()->route('home');
    }
}
