<?php

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
        $this->call(Admin::class);
        $this->call(DanhMuc::class);
        $this->call(ThuongHieu::class);

    }
}
