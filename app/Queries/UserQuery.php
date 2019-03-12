<?php

namespace App\Queries;

use App\User;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class UserQuery extends AppQuery
{
	public static function getPaginated($data, $request)
	{
		$query = User::query();
		$currentUser = $request->user();
		if ($currentUser->is_admin) {
			return $query->paginate(20);
		}

		throw new UnauthorizedHttpException('not_allowed');
	}

	public static function findOrFail($id, $request)
	{
		$currentUser = $request->user();
		$user = User::with('roles')->findOrFail($id);
		if($currentUser->is_admin) {
			return $user;
		}

		throw new UnauthorizedHttpException('not_allowed');
	}
}
