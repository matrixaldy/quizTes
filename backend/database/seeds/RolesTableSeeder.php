<?php

use Illuminate\Database\Seeder;

use App\Role;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'Administrator', 'User'
        ];

        foreach($roles as $key=>$val) {
            Role::create([
                'name' => $val
            ]);
        }
    }
}
