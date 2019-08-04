@extends('backend.layout.master')

@section('title')
Cập nhật Loại
@endsection

@section('feature-title')
Cập nhật Loại
@endsection

@section('feature-description')
Cập nhật Loại. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form method="post" action="{{ route('backend.loai.update', ['id' => $loai->l_ma]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT" />
    <div class="form-group">
        <label for="l_ten">Tên Loại</label>
        <input type="text" class="form-control" id="l_ten" name="l_ten" aria-describedby="l_tenHelp" placeholder="Nhập tên Loại" value="{{  old('l_ten', $loai->l_ten )}}">
        <small id="l_tenHelp" class="form-text text-muted">Nhập tên Loại. Giới hạn trong 191 ký tự.</small>
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection