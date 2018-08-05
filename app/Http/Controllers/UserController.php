<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
	public function login(Request $request)
	{
		$email = $request->get('email');
		$password = $request->get('password');

		try {
			$user = User::where("email", $email)->first();
			if ($user) {
				if (Hash::check($password, $user->password)) {
					return response()->json([
						'error' => false
					], 201);
				} else {
					return response()->json([
						'error' => true,
						'error_msg' => "رمز عبور نادرست است"
					], 201);
				}
			} else {
				return response()->json([
					'error' => true,
					'error_msg' => "چنین کاربری ثبت نشده است"
				], 201);
			}
		} catch (Exception $exception) {
			return response()->json([
				'error' => true,
				'error_msg' => "مشکلی به وجود آمده است"
			], 201);
		}
	}

	public function register(Request $request)
	{
		try {
			$name = $request->get('name');
			$email = $request->get('email');
			$password = $request->get('password');

			$user = new User();
			$user->name = $name;
			$user->email = $email;
			$user->password = bcrypt($password);
			$user->save();

			return response()->json([
				'error' => false
			], 201);
		} catch (Exception $exception) {
			return response()->json([
				'error' => true,
				'error_msg' => "مشکلی به وجود آمده است"
			], 201);
		}
	}
}
