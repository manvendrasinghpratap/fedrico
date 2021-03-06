<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
		 /*DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);*/
		//factory(App\User::class, 50)->create()->make();
       factory(App\User::class, 50)->create()->each(function ($u) {
            $u->userdetails()->save(factory(\App\UserDetail::class)->make());
        });
    }
}
