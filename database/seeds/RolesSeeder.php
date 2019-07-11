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
        if (Role::count() == 0) {
            $array = [
                ['name' => 'Secret'],
                ['name' => 'Admin'],
            ];

            foreach ($array as $item) {
                Role::create($item);

                // ถ้าไม่ใส่ $fillable ต้องทำวิธีนี้
                // $obj = new Role;
                // $obj->name = item['name'];
                // $obj->save();
            }
        }
    }
}
