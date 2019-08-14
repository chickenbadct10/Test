<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MayBan;
use App\Loai;
use Session;
use Storage;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Carbon;

class MayBanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Sử dụng Eloquent Model để truy vấn dữ liệu
        // $ds_sanpham = SanPham::all(); // SELECT * FROM sanpham

        // Sử dụng Eloquennt Model phân trang
        // Mỗi trang có 5 mẫu tin
        $ds_sanpham = MayBan::paginate(5); // SELECT * FROM sanpham LIMIT 0,5

        // Đường dẫn đến view được quy định như sau: <FolderName>.<ViewName>
        // Mặc định đường dẫn gốc của method view() là thư mục `resources/views`
        // Hiển thị view `backend.sanpham.index`
        return view('backend.mayban.index')
            // với dữ liệu truyền từ Controller qua View, được đặt tên là `danhsachsanpham`
            ->with('danhsachsanpham', $ds_sanpham);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Sử dụng Eloquent Model để truy vấn dữ liệu
        $ds_loai = Loai::all(); // SELECT * FROM loai

        // Đường dẫn đến view được quy định như sau: <FolderName>.<ViewName>
        // Mặc định đường dẫn gốc của method view() là thư mục `resources/views`
        // Hiển thị view `backend.sanpham.create`
        return view('backend.mayban.create')
            // với dữ liệu truyền từ Controller qua View, được đặt tên là `danhsachloai`
            ->with('danhsachloai', $ds_loai);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sp = new MayBan();
        $sp->mb_ten = $request->mb_ten;
        $sp->mb_giaGoc = $request->mb_giaGoc;
        $sp->mb_giaBan = $request->mb_giaBan;
        $sp->mb_thongTin = $request->mb_thongTin;
        $sp->mb_danhGia = $request->mb_danhGia;
        $sp->mb_taoMoi = Carbon::now();
        $sp->mb_capNhat = Carbon::now();
        $sp->mb_trangThai = $request->mb_trangThai;
        $sp->l_ma = $request->l_ma;

        if($request->hasFile('mb_hinh'))
        {
            $file = $request->mb_hinh;

            // Lưu tên hình vào column sp_hinh
            $sp->mb_hinh = $file->getClientOriginalName();
            
            // Chép file vào thư mục "photos"
            $fileSaved = $file->storeAs('public/photos', $sp->mb_hinh);
        }
        $sp->save();

        Session::flash('alert-info', 'Thêm mới thành công');
        return redirect()->route('backend.maybans.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sp = MayBan::where("mb_ma", $id)->first();
        $ds_loai = Loai::all();

        return view('backend.mayban.edit')
            ->with('sp', $sp)
            ->with('danhsachloai', $ds_loai);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sp = MayBan::where("mb_ma",  $id)->first();
        $sp->mb_ten = $request->mb_ten;
        $sp->mb_giaGoc = $request->mb_giaGoc;
        $sp->mb_giaBan = $request->mb_giaBan;
        $sp->mb_thongTin = $request->mb_thongTin;
        $sp->mb_danhGia = $request->mb_danhGia;
        $sp->mb_capNhat = Carbon::now();
        $sp->mb_trangThai = $request->mb_trangThai;
        $sp->l_ma = $request->l_ma;

        if($request->hasFile('mb_hinh'))
        {
            // Xóa hình cũ để tránh rác
            Storage::delete('public/photos/' . $sp->mb_hinh);

            // Upload hình mới
            // Lưu tên hình vào column sp_hinh
            $file = $request->mb_hinh;
            $sp->mb_hinh = $file->getClientOriginalName();
            
            // Chép file vào thư mục "photos"
            $fileSaved = $file->storeAs('public/photos', $sp->mb_hinh);
        }
        $sp->save();

        Session::flash('alert-info', 'Cập nhật thành công');
        return redirect()->route('backend.mayban.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sp = MayBan::where("mb_ma",  $id)->first();
        if(empty($sp) == false)
        {
            // Xóa hình cũ để tránh rác
            Storage::delete('public/photos/' . $sp->mb_hinh);
        }

        $sp->delete();

        Session::flash('alert-info', 'Xóa sản phẩm thành công');
        return redirect()->route('backend.mayban.index');
    }

    public function print() {
        $ds_sanpham = MayBan::all();
        $ds_loai    = Loai::all();
        $data = [
            'danhsachsanpham' => $ds_sanpham,
            'danhsachloai'    => $ds_loai,
        ];
        return view('backend.mayban.print')
            ->with('danhsachsanpham', $ds_sanpham)
            ->with('danhsachloai', $ds_loai);
    }

    /**
     * Action xuất PDF
     */
    public function pdf() 
    {
        $ds_sanpham = MayBan::all();
        $ds_loai    = Loai::all();
        $data = [
            'danhsachsanpham' => $ds_sanpham,
            'danhsachloai'    => $ds_loai,
        ];

        /* Code dành cho việc debug
        - Khi debug cần hiển thị view để xem trước khi Export PDF
        */
        // return view('backend.sanpham.pdf')
        //     ->with('danhsachsanpham', $ds_sanpham)
        //     ->with('danhsachloai', $ds_loai);

        $pdf = PDF::loadView('backend.mayban.pdf', $data);
        return $pdf->download('DanhMucMayBan.pdf');
    }
}
