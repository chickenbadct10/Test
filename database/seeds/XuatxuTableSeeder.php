<?php

use Illuminate\Database\Seeder;

class XuatxuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $today = new DateTime('2010-01-01 08:00:00');
        $list = [
            [
                'xx_ma'      => 1,
                'xx_ten'     => "Nhập khẩu Mỹ",
                'xx_taoMoi'  => $today->format('Y-m-d H:i:s'),
                'xx_capNhat' => $today->format('Y-m-d H:i:s')
            ],
            [
                'xx_ma'      => 2,
                'xx_ten'     => "Lắp ráp trong nước",
                'xx_taoMoi'  => $today->format('Y-m-d H:i:s'),
                'xx_capNhat' => $today->format('Y-m-d H:i:s')
            ],
            [
                'xx_ma'      => 3,
                'xx_ten'     => "Nhập khẩu Trung Quốc",
                'xx_taoMoi'  => $today->format('Y-m-d H:i:s'),
                'xx_capNhat' => $today->format('Y-m-d H:i:s')
            ],
            [
                'xx_ma'      => 4,
                'xx_ten'     => "Nhập khẩu Đài loan",
                'xx_taoMoi'  => $today->format('Y-m-d H:i:s'),
                'xx_capNhat' => $today->format('Y-m-d H:i:s')
            ],
            [
                'xx_ma'      => 5,
                'xx_ten'     => "Nhập khẩu Hàn Quốc",
                'xx_taoMoi'  => $today->format('Y-m-d H:i:s'),
                'xx_capNhat' => $today->format('Y-m-d H:i:s')
            ],
            [
                'xx_ma'      => 6,
                'xx_ten'     => "Nhập khẩu Nhật Bản",
                'xx_taoMoi'  => $today->format('Y-m-d H:i:s'),
                'xx_capNhat' => $today->format('Y-m-d H:i:s')
            ],
            [
                'xx_ma'      => 7,
                'xx_ten'     => "Sản xuât trong nước",
                'xx_taoMoi'  => $today->format('Y-m-d H:i:s'),
                'xx_capNhat' => $today->format('Y-m-d H:i:s')
            ]
        ];
        DB::table('cusc_xuatxu')->insert($list);
    }
}