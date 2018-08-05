<?php
/**
 * Created by PhpStorm.
 * User: hatamiarash7
 * Date: 2018-01-05
 * Time: 01:57
 */

namespace app\Http\Composers;


use Illuminate\Contracts\View\View;

class AuthComposer
{
	protected $user;

	public function __construct()
	{
		if (auth()->check())
			$this->user = auth()->user();
	}

	public function compose(View $view)
	{
		$view->with('authUser', $this->user);
	}
}