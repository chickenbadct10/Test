<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Thanhtoan;
use App\Http\Requests\ThanhToanCreateRequest;
use Session;
class ThanhToanController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Lấy danh sach Thanh toán trong Database
        $danhsachthanhtoan = Thanhtoan::paginate(5); //SELECT * FROM cusc_chude

        return view('backend.thanhtoan.index')
            ->with('danhsachthanhtoan', $danhsachthanhtoan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.thanhtoan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ThanhToanCreateRequest $request)
    {

        $tt = new Thanhtoan();
        $tt->tt_ten = $request->input('tt_ten');
        $tt->tt_dienGiai = $request->input('tt_dienGiai');
        $tt->tt_trangThai = 2;
        $tt->save();
        Session::flash('alert-warning', 'Thêm mới thành công');
        return redirect()->route('backend.thanhtoan.index');
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
        $tt = Thanhtoan::find($id);

        return view('backend.thanhtoan.edit')
            ->with('danhsachthanhtoan', $tt);
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
        $tt = Thanhtoan::find($id);
        $tt->tt_ten = $request->input('tt_ten');
        $tt->tt_dienGiai = $request->input('tt_dienGiai');
        $tt->save();
        Session::flash('alert-warning','Cập nhật thành công');
        return redirect()->route('backend.thanhtoan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tt = Thanhtoan::find($id);
        $tt->delete();
        Session::flash('alert-danger','Xóa thành công');
        return redirect()->route('backend.thanhtoan.index');
    }
}
