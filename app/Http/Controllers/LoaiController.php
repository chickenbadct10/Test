<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Loai;
use Session;
use Validator;
use App\Http\Requests\LoaiCreateRequest;

class LoaiController  extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Lấy danh sach Chủ đề trong Database
        $danhsachloai = Loai::paginate(5); //SELECT * FROM cusc_chude

        return view('backend.loai.index')
            ->with('danhsachloai', $danhsachloai);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.loai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoaiCreateRequest $request)
    {

        $l = new Loai();
        $l->l_ten = $request->input('l_ten');
        $l->l_trangThai = 2;
        $l->save();
        Session::flash('alert-warning', 'Thêm mới thành công');
        return redirect()->route('backend.loai.index');
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
        $loai = Loai::find($id);

        return view('backend.loai.edit')
            ->with('loai', $loai);
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
        $l = Loai::find($id);
        $l->l_ten = $request->input('l_ten');
        $l->save();
        Session::flash('alert-warning','Cập nhật thành công');
        return redirect()->route('backend.loai.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $l = Loai::find($id);
        $l->delete();
        Session::flash('alert-danger','Xóa thành công');
        return redirect()->route('backend.loai.index');
    }
}
