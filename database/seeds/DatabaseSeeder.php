<?php

use App\Project;
use App\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    // $this->call(UsersTableSeeder::class);

	  DB::table('users')->insert([
		  [
			  'name'     => 'Super Admin',
        'role'     => 'admin',
			  'email'    => 'pedroincora@gmail.com',
			  'phone'    => '123 456 7890',
			  'password' => bcrypt('pyma2012'),
		  ]
    ]);

    factory(Category::class, 10)->create();
    factory(Project::class, 50)->create();
  }
}