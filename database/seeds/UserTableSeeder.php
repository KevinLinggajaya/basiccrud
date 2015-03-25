<?php namespace database\seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserTableSeeder extends Seeder {

	public function run()
	{
         //delete users table records
		DB::table('users')->delete();
         //insert some dummy records
		DB::table('users')->insert(array(
			array('name'=>'Kevin',
				  'email'=>'kevin.linggajaya@gmail.com',
				  'password'=> Hash::make('qwe123'),
				  'updated_at'=> Carbon::now()->toDateTimeString(),
				  'created_at'=> Carbon::now()->toDateTimeString()),
			array('name'=>'Admin',
				  'email'=>'admin@printerous.com',
				  'password'=> Hash::make('qwe123'),
				  'updated_at'=> Carbon::now()->toDateTimeString(),
				  'created_at'=> Carbon::now()->toDateTimeString())
		));
	}

}