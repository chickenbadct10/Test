<?php

use Illuminate\Database\Seeder;
use Illuminate\PhpVnDataGenerator\VnBase;
use Illuminate\PhpVnDataGenerator\VnFullname;
use Illuminate\PhpVnDataGenerator\VnPersonalInfo;

class MaybanTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $list = [];
        $uFN = new VnFullname();
        $uPI = new VnPersonalInfo();
        $faker    = Faker\Factory::create('vi_VN');
        $photos = array('dell.jpg','acer.jpg','asus.jpg','apple.jpg','intel.jpg','Phong Vũ.jpg','hp.jpg','lenovo.jpg','Gigabyte.jpg');

        for ($i=1; $i <= 30; $i++) {
            $today = new DateTime();
            array_push($list, [
                'mb_ten'                  => "mb_ten $i",
                'mb_giaGoc'               => $i,
                'mb_giaBan'               => $i,
                'mb_hinh'                 => "mayban-$i.jpg",
                'mb_thongTin'             => "mb_thong $i",
                'mb_danhGia'              => "mb_danhGia $i",
                'mb_taoMoi'               => $today->format('Y-m-d H:i:s'),
                'mb_capNhat'              => $today->format('Y-m-d H:i:s'),
                'mb_trangThai'            => $i,
                'l_ma'                    => $faker->numberBetween(1, 9)
            ]);
        }
        DB::table('cusc_mayban')->insert($list);
    }
}