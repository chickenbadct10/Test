<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Quyen;
use App\Http\Requests\QuyenCreateRequest;
use Session;
class QuyenController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Lấy danh sach Thanh toán trong Database
        $danhsachquyen = Quyen::paginate(5); //SELECT * FROM cusc_chude

        return view('backend.quyen.index')
            ->with('danhsachquyen', $danhsachquyen);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.quyen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuyenCreateRequest $request)
    {

        $q = new Quyen();
        $q->q_ten = $request->input('q_ten');
        $q->q_dienGiai = $request->input('q_dienGiai');
        $q->q_trangThai = 2;
        $q->save();
        Session::flash('alert-warning', 'Thêm mới thành công');
        return redirect()->route('backend.quyen.index');
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
        $q = Quyen::find($id);

        return view('backend.quyen.edit')
            ->with('danhsachquyen', $q);
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
        $q = Quyen::find($id);
        $q->q_ten = $request->input('q_ten');
        $q->q_dienGiai = $request->input('q_dienGiai');
        $q->save();
        Session::flash('alert-warning','Cập nhật thành công');
        return redirect()->route('backend.quyen.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $q = Quyen::find($id);
        $q->delete();
        Session::flash('alert-danger','Xóa thành công');
        return redirect()->route('backend.quyen.index');
    }
}
