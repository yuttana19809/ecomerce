<?php

use Illuminate\Database\Seeder;
use App\Role;
class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    if (Role::count()== 0){

       $array =[
       ['name' => 'SecretAdmin'],
       ['name' => 'Admin'],
       ];

       foreach ($array as $item)
       Role::create($item);
    }
}
}
