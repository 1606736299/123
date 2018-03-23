<?php 
namespace Zizaco\Entrust\Middleware;

/**
 * This file is part of Entrust,
 * a role & permission management solution for Laravel.
 *
 * @license MIT
 * @package Zizaco\Entrust
 */

use Closure;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Model\User;
class EntrustAbility
{
	protected $auth;

	/**
	 * Creates a new instance of the middleware.
	 *
	 * @param Guard $auth
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param Closure $next
	 * @param $roles
	 * @param $permissions
	 * @param bool $validateAll
	 * @return mixed
	 */
	public function handle($request, Closure $next, $roles, $permissions, $validateAll = false)
	{
		$user = User::find(session('userInfo')->id);
		// dd($user);

		if (!$user || !$user->ability(explode('|', $roles), explode('|', $permissions), array('validate_all' => $validateAll))) {
			die("<script>alert('权限不够');javascript:back();</script>");
		}

		return $next($request);
	}
}
