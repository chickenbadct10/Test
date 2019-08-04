@extends('backend.layout.master')

@section('title')
Cập nhật Quyền
@endsection

@section('feature-title')
Cập nhật Quyền
@endsection

@section('feature-description')
Cập nhật Quyền. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form method="post" action="{{ route('backend.quyen.update', ['id' => $danhsachquyen->q_ma]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT" />
    <div class="form-group">
        <label for="q_ten">Tên Quyền</label>
        <input type="text" class="form-control" id="q_ten" name="q_ten" aria-describedby="q_tenHelp" value="{{  old('q_ten', $danhsachquyen->q_ten )}}">
    </div>
    <div class="form-group">
        <label for="q_dienGiai">Diễn giải</label>
        <input type="text" class="form-control" id="q_dienGiai" name="q_dienGiai" aria-describedby="q_dienGiaiHelp" value="{{old('q_dienGiai',  $danhsachquyen->q_dienGiai )}}">
    </div>
    <div class="form-group">
    <button class="btn btn-primary">Lưu</button>
    <a class="btn btn-danger" href="{{route('backend.quyen.index')}}">Trở về</a>
    </div>
</form>
@endsection