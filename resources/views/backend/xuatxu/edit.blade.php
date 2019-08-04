@extends('backend.layout.master')

@section('title')
Cập nhật Xuất xứ
@endsection

@section('feature-title')
Cập nhật Xuất xứ
@endsection

@section('feature-description')
Cập nhật Xuất xứ. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form method="post" action="{{ route('backend.xuatxu.update', ['id' => $danhsachxuatxu->xx_ma]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT" />
    <div class="form-group">
        <label for="xx_ten">Tên Xuất xứ</label>
        <input type="text" class="form-control" id="xx_ten" name="xx_ten" aria-describedby="xx_tenHelp" value="{{old('xx_ten',  $danhsachxuatxu->xx_ten )}}">
    </div>
    <div class="form-group">
    <button class="btn btn-primary">Lưu</button>
    <a class="btn btn-danger" href="{{route('backend.xuatxu.index')}}">Trở về</a>
    </div>
</form>
@endsection