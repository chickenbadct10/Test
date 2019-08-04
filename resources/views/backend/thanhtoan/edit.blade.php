@extends('backend.layout.master')

@section('title')
Cập nhật Thanh toán
@endsection

@section('feature-title')
Cập nhật Thanh toán
@endsection

@section('feature-description')
Cập nhật Thanh toán. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form method="post" action="{{ route('backend.thanhtoan.update', ['id' => $danhsachthanhtoan->tt_ma]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT" />
    <div class="form-group">
        <label for="tt_ten">Tên Thanh toán</label>
        <input type="text" class="form-control" id="tt_ten" name="tt_ten" aria-describedby="tt_tenHelp" value="{{  old('tt_ten', $danhsachthanhtoan->tt_ten )}}">
    </div>
    <div class="form-group">
        <label for="tt_dienGiai">Diễn giải</label>
        <input type="text" class="form-control" id="tt_dienGiai" name="tt_dienGiai" aria-describedby="tt_dienGiaiHelp" value="{{old('tt_dienGiai',  $danhsachthanhtoan->tt_dienGiai )}}">
    </div>
    <div class="form-group">
    <button class="btn btn-primary">Lưu</button>
    <a class="btn btn-danger" href="{{route('backend.thanhtoan.index')}}">Trở về</a>
    </div>
</form>
@endsection