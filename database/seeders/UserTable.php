<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'email' => 'admin@gmail.com',
            'password'=>bcrypt('123456'),
            'level' => '1'

        ];

        DB::table('user')->insert($data);

    }
}