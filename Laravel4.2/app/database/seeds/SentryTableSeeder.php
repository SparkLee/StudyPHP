<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
class SentryTableSeeder extends Seeder {
	public function run() {
		DB::table ( 'users' )->delete ();
		DB::table ( 'groups' )->delete ();
		DB::table ( 'users_groups' )->delete ();
		
		Sentry::getUserProvider ()->create ( array (
				'email' => 'liweijsj@163.com',
				'password' => "123456",
				'first_name' => 'Spark',
				'last_name' => 'Lee',
				'activated' => 1 
		) );
		
		Sentry::getGroupProvider ()->create ( array (
				'name' => 'Admin',
				'permissions' => [ 
						'admin' => 1 
				] 
		) );
		
		// 将用户加入用户组
		$adminUser = Sentry::getUserProvider ()->findByLogin ( 'liweijsj@163.com' );
		$adminGroup = Sentry::getGroupProvider ()->findByName ( 'Admin' );
		$adminUser->addGroup ( $adminGroup );
	}
}