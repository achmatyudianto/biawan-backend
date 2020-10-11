<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use App\Http\Resources\User as UserResource;
use App\User;
use App\Company;
use Auth;

class AuthController extends Controller
{
	public function register(Request $request, User $user, Company $company)
	{
		$this->validate($request, [
			'company_name'	=> 'required',
			'name'			=> 'required',
			'email'			=> 'required|email|unique:users',
			'password'		=> 'required|confirmed|min:6',
		]);

		$company = $company->create([
			'company_name' => $request->company_name,
		]);

		$user = $user->create([
			'name'			=> $request->name,
			'email'			=> $request->email,
			'api_token'		=> Str::random(60),
			'password'		=> Hash::make($request->password),
			'company_id'	=> $company->id,
		]);

		return new UserResource($user);
	}

	public function login(Request $request, User $user) 
	{
		if(!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
			return response()->json(['error' => 'Your credential is wrong'], 401);
		}

		$user = Auth::user();

		return new UserResource($user);
	}
}
