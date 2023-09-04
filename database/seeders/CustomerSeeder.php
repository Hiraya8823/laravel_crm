<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $param = [
            [
                'name' => '高橋一真',
                'email' => 'abcdef@gmail.com',
                'zipcode' => '0481544',
                'address' => '岩手県八幡平市',
                'phone' => '123456789',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => '平山 太郎',
                'email' => 'abcdef@gmail.com',
                'zipcode' => '0481544',
                'address' => '岩手県八幡平市',
                'phone' => '123456789',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ];

        # DB::table->insertでレコードの登録
        DB::table('customers')->insert($param);
    }
}
