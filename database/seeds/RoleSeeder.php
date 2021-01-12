<?php
use \Carbon\Carbon;
use Illuminate\Database\Seeder;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('roles')->insert([
        ['name'=>'Superadmin',
         'slug'=>'Superadmin',
         'created_at'=>Carbon::now(),
         'updated_at'=>Carbon::now(),
        ],
        ['name'=>'Admin',
         'slug'=>'Admin',
         'created_at'=>Carbon::now(),
         'updated_at'=>Carbon::now(),
        ],
        ['name'=>'Inventory Manager',
         'slug'=>'Inventory Manager',
         'created_at'=>Carbon::now(),
         'updated_at'=>Carbon::now(),
        ],
        ['name'=>'Order Manager',
         'slug'=>'Order Manager',
         'created_at'=>Carbon::now(),
         'updated_at'=>Carbon::now(),
        ],
        ['name'=>'Customer',
         'slug'=>'Customer',
         'created_at'=>Carbon::now(),
         'updated_at'=>Carbon::now(),
        ],
      ]);
    }
}
