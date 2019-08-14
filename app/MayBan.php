<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class MayBan extends Model
{
    const     CREATED_AT    = 'mb_taoMoi';
    const     UPDATED_AT    = 'mb_capNhat';

    protected $table        = 'cusc_mayban';
    protected $fillable     = ['mb_ten', 'mb_giaGoc', 'mb_giaBan', 'mb_hinh', 'mb_thongTin', 'mb_danhGia', 'mb_taoMoi', 'mb_capNhat', 'mb_trangThai', 'l_ma'];
    protected $guarded      = ['mb_ma'];

    protected $primaryKey   = 'mb_ma';

    protected $dates        = ['mb_taoMoi', 'mb_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function loaisanpham()
    {
        return $this->belongsTo('App\Loai', 'l_ma', 'l_ma');
    }
}
