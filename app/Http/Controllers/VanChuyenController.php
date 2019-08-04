<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Vanchuyen;
use App\Http\Requests\VanChuyenCreateRequest;
class VanChuyenController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Lấy danh sach Chủ đề trong Database
        $danhsachvanchuyen = Vanchuyen::paginate(5); //SELECT * FROM cusc_chude

        return view('backend.vanchuyen.index')
            ->with('danhsachvanchuyen', $danhsachvanchuyen);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.vanchuyen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VanChuyenCreateRequest $request)
    {

        $vc = new Vanchuyen();
        $vc->vc_ten = $request->input('vc_ten');
        $vc->vc_chiPhi = $request->input('vc_chiPhi');
        $vc->vc_dienGiai = $request->input('vc_dienGiai');
        $vc->vc_trangThai = 2;
        $vc->save();
        Session::flash('alert-warning', 'Thêm mới thành công');
        return redirect()->route('backend.vanchuyen.index');
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
        $vc = Vanchuyen::find($id);

        return view('backend.vanchuyen.edit')
            ->with('danhsachvanchuyen', $vc);
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
        $vc = Vanchuyen::find($id);
        $vc->vc_ten = $request->input('vc_ten');
        $vc->vc_chiPhi = $request->input('vc_chiPhi');
        $vc->vc_dienGiai = $request->input('vc_dienGiai');
        $vc->vc_trangThai = 2;
        $vc->save();
        Session::flash('alert-warning','Cập nhật thành công');
        return redirect()->route('backend.vanchuyen.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vc = Vanchuyen::find($id);
        $vc->delete();
        Session::flash('alert-danger','Xóa thành công');
        return redirect()->route('backend.vanchuyen.index');
    }
}
