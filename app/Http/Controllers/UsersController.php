<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    /**
     * Is the email valid.
     *
     * @param  string  $email
     *
     * @return bool
     */
    public static function isEmailValid($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        list($user, $domain) = explode('@', $email);
        if (!checkdnsrr($domain, 'MX')) {
            return false;
        }

        return true;
    }

    /**
     * Does an email exist in the users table.
     *
     * @param  Request  $request
     *
     * @return json
     */
    public function userEmailExists(Request $request)
    {
        if (!$request->input('email')) {
            return response()->json([
                'status' => 'fail',
                'response_code' => 1,
                'message' => 'Not enough arguments. No email supplied.',
            ]);
        }
        if (!self::isEmailValid($request->input('email'))) {
            return response()->json([
                'status' => 'fail',
                'response_code' => 4,
                'message' => 'The email specified is invalid.',
            ]);
        }
        if (User::where('email', $request->input('email'))->first()) {
            return response()->json([
                'status' => 'success',
                'response_code' => 2,
                'message' => 'User exists in system.',
            ]);
        } else {
            return response()->json([
                'status' => 'success',
                'response_code' => 3,
                'message' => 'User with email specified does not exist.',
            ]);
        }
    }
}
