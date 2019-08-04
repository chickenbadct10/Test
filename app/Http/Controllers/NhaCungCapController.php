<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Http\Requests\NhaCungCapCreateRequest;
use App\Nhacungcap;
use Carbon\Carbon;
use App\Xuatxu;

class NhaCungCapController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Lấy danh sach Chủ đề trong Database
        $danhsachnhacungcap = Nhacungcap::paginate(5); //SELECT * FROM cusc_chude

        return view('backend.nhacungcap.index')
            ->with('danhsachnhacungcap', $danhsachnhacungcap);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dsxuatxu = Xuatxu::all();
        return view('backend.nhacungcap.create')
                ->with('danhsachxuatxu',$dsxuatxu);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NhaCungCapCreateRequest $request)
    {

        $ncc = new Nhacungcap();
        $ncc->ncc_ten = $request->input('ncc_ten');
        $ncc->ncc_daiDien = $request->input('ncc_daiDien');
        $ncc->ncc_diaChi = $request->input('ncc_diaChi');
        $ncc->ncc_dienThoai = $request->input('ncc_dienThoai');
        $ncc->ncc_email = $request->input('ncc_email');
        $ncc->ncc_taoMoi = Carbon::now();
        $ncc->ncc_capNhat = Carbon::now();
        $ncc->ncc_trangThai = 2;
        $ncc->xx_ma = $request->input('xx_ma');
        $ncc->ncc_trangThai = 2;
        $ncc->save();
        Session::flash('alert-warning', 'Thêm mới thành công');
        return redirect()->route('backend.nhacungcap.index');
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
        $ncc = Nhacungcap::find($id);
        $dsxuatxu = Xuatxu::all();
        return view('backend.nhacungcap.edit')
            ->with('danhsachnhacungcap', $ncc)
            ->with('danhsachxuatxu',$dsxuatxu);
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
        $ncc = Nhacungcap::find($id);
        $ncc->ncc_ten = $request->input('ncc_ten');
        $ncc->ncc_daiDien = $request->input('ncc_daiDien');
        $ncc->ncc_diaChi = $request->input('ncc_diaChi');
        $ncc->ncc_dienThoai = $request->input('ncc_dienThoai');
        $ncc->ncc_email = $request->input('ncc_email');
        $ncc->ncc_taoMoi = Carbon::now();
        $ncc->ncc_capNhat = Carbon::now();
        $ncc->ncc_trangThai = 2;
        $ncc->xx_ma = $request->input('xx_ma');
        $ncc->ncc_trangThai = 2;
        $ncc->save();
        Session::flash('alert-warning','Cập nhật thành công');
        return redirect()->route('backend.nhacungcap.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ncc = Nhacungcap::find($id);
        $ncc->delete();
        Session::flash('alert-danger','Xóa thành công');
        return redirect()->route('backend.nhacungcap.index');
    }
}
