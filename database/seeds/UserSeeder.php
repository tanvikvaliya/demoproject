<?php

use Illuminate\Database\Seeder;
use \Carbon\Carbon;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        'username'=>'admin',
        'first_name'=>'Admin',
        'last_name'=>'admin',
        'email'=>'admin@gmail.com',
        'status'=>'Active',
        'password'=>bcrypt('admin123'),
        'created_at'=>Carbon::now(),
        'updated_at'=>Carbon::now(),
      ]);
    }
}
