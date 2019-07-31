<?php

use Illuminate\Database\Seeder;

class LoaiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $list = [];
        $types = ["Dell", "Acer", "Asus", "SamSung", "HP",
                       "Lenovo", "Xiaomi", "LG", "MSI", "MacBook"];
        sort($types);
        $today = new DateTime('2019-01-01 08:00:00');
        for ($i=1; $i <= count($types); $i++) {
            array_push($list, [
                'l_ma'      => $i,
                'l_ten'     => $types[$i-1],
                'l_taoMoi'  => $today->format('Y-m-d H:i:s'),
                'l_capNhat' => $today->format('Y-m-d H:i:s')
            ]);
        }
        DB::table('cusc_loai')->insert($list);
    }
}