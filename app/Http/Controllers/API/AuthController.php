<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use DB;
use Validator;

use App\Models\User;

use App\Http\Resources\UsersResource;
use App\Http\Resources\UserResource;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $rules = [
			'email' => 'required',
			'password' => 'required'
        ];

        $_user = $request->input();

        $validator = Validator::make($_user, $rules);

        if ($validator->fails()) {
			$errors = $validator->errors()->toArray();

			$data = [
				'status' => 'Fail',
				'errors' => $errors
			];
        } else {
			$where = [
				['email', '=', $_user['email']]
			];
			$user = User::where($where)->first();
			
			if ($user) {
				if (!Hash::check($_user['password'], $user->password)) {
					$errors = [
						'Incorrect password!'
					];			

					$data = [
						'status' => 'Fail',
						'errors' => $errors
					];
				} else {
					$user_resource = new UserResource($user);

					$data = [
						'status' => 'Success',
						'data' => [
							'id' => $user->id,
							'user' => $user_resource
						]
					];
				}
			} else {
				$errors = [
					'User does not exist!'
				];
				
				$data = [
					'status' => 'Fail',
					'errors' => $errors
				];
			}
		}
		
		return response()->json($data);
    }
}
