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
        $this->call(KhachhangTableSeeder::class);
        $this->call(LoaiTableSeeder::class);
        $this->call(QuyenTableSeeder::class);
        $this->call(ThanhtoanTableSeeder::class);
        $this->call(VanchuyenTableSeeder::class);
        $this->call(XuatxuTableSeeder::class);
        $this->call(NhaCungCapTableSeeder::class);
        $this->call(NhanvienTableSeeder::class);
        $this->call(SanphamTableSeeder::class);
        //$this->call(HinhanhTableSeeder::class);
        $this->call(KhuyenmaiTableSeeder::class);
        $this->call(GopYTableSeeder::class);
        $this->call(DonhangTableSeeder::class);
        $this->call(PhieunhapTableSeeder::class);
        $this->call(HoadonsiTableSeeder::class);
        $this->call(ChitietnhapTableSeeder::class);
        $this->call(ChitietdonhangTableSeeder::class);
        $this->call(HoadonleTableSeeder::class);    
    }
}