<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Xuatxu;
use App\Http\Requests\XuatXuCreateRequest;
class XuatXuController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Lấy danh sach Chủ đề trong Database
        $danhsachxuatxu = Xuatxu::paginate(5); //SELECT * FROM cusc_chude

        return view('backend.xuatxu.index')
            ->with('danhsachxuatxu', $danhsachxuatxu);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.xuatxu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(XuatXuCreateRequest $request)
    {

        $xx = new Xuatxu();
        $xx->xx_ten = $request->input('xx_ten');
        $xx->xx_trangThai = 2;
        $xx->save();
        Session::flash('alert-warning', 'Thêm mới thành công');
        return redirect()->route('backend.xuatxu.index');
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
        $xx = Xuatxu::find($id);

        return view('backend.xuatxu.edit')
            ->with('danhsachxuatxu', $xx);
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
        $xx = Xuatxu::find($id);
        $xx->xx_ten = $request->input('xx_ten');
        $xx->xx_trangThai = 2;
        $xx->save();
        Session::flash('alert-warning','Cập nhật thành công');
        return redirect()->route('backend.xuatxu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $xx = Xuatxu::find($id);
        $xx->delete();
        Session::flash('alert-danger','Xóa thành công');
        return redirect()->route('backend.xuatxu.index');
    }
}
