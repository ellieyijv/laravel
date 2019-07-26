<?php
namespace App\Repositories;
use App\Repositories\UserRepository;

class DbUserRepository implements UserRepository
{
	
	public function create($attribute)
	{
		// User::create();
		dd('create the user');
	}


}