<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMayBanTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('cusc_mayban', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('mb_ma')->comment('Mã sản phẩm');
            $table->string('mb_ten', 191)->comment('Tên sản phẩm # Tên sản phẩm');
            $table->unsignedInteger('mb_giaGoc')->default('0')->comment('Giá gốc # Giá gốc của sản phẩm');
            $table->unsignedInteger('mb_giaBan')->default('0')->comment('Giá bán # Giá bán hiện tại của sản phẩm');
            $table->string('mb_hinh', 200)->comment('Hình đại diện # Hình đại diện của sản phẩm');
            $table->text('mb_thongTin')->comment('Thông tin # Thông tin về sản phẩm');
            $table->string('mb_danhGia', 50)->default('0;0;0;0;0')->comment('Chất lượng # Chất lượng của sản phẩm (1-5 sao), định dạng: 1;2;3;4;5');
            $table->timestamp('mb_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm đầu tiên tạo sản phẩm');
            $table->timestamp('mb_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật sản phẩm gần nhất');
            $table->tinyInteger('mb_trangThai')->default('2')->comment('Trạng thái # Trạng thái sản phẩm: 1-khóa, 2-khả dụng');
            $table->unsignedTinyInteger('l_ma')->comment('Loại sản phẩm # l_ma # l_ten # Mã loại sản phẩm');
            
            $table->unique(['mb_ten']);
            $table->foreign('l_ma') //cột khóa ngoại là cột `l_ma` trong table `sanpham`
                ->references('l_ma')->on('cusc_loai') //cột sẽ tham chiếu đến là cột `l_ma` trong table `loai`
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
        });
        DB::statement("ALTER TABLE `cusc_mayban` comment 'Sản phẩm # Sản phẩm: hoa, giỏ hoa, vòng hoa, ...'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('cusc_sanpham');
    }
}
