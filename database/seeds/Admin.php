<?php

use Illuminate\Database\Seeder;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_admin')->insert([
            'admin_email'=>'admin@gmail.com',
            'admin_password'=>md5('123456'),
            'admin_name'=>'Hiếu Thành',
            'admin_phone'=>'0355668062',
        ]);
    }
}
