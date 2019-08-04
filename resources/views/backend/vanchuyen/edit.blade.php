@extends('backend.layout.master')

@section('title')
Cập nhật Vận chuyển
@endsection

@section('feature-title')
Cập nhật Vận chuyển
@endsection

@section('feature-description')
Cập nhật Vận chuyển. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form method="post" action="{{ route('backend.vanchuyen.update', ['id' => $danhsachvanchuyen->vc_ma]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT" />
    <div class="form-group">
        <label for="vc_ten">Tên Vận chuyển</label>
        <input type="text" class="form-control" id="vc_ten" name="vc_ten" aria-describedby="vc_tenHelp" value="{{ old('vc_ten',  $danhsachvanchuyen->vc_ten) }}">
    </div>
    <div class="form-group">
        <label for="vc_chiPhi">Chi phí</label>
        <input type="text" class="form-control" id="vc_chiPhi" name="vc_chiPhi" aria-describedby="vc_chiPhiHelp" value="{{ old('vc_chiPhi',  $danhsachvanchuyen->vc_chiPhi )}}">
    </div>
    <div class="form-group">
        <label for="vc_dienGiai">Diễn giải</label>
        <input type="text" class="form-control" id="vc_dienGiai" name="vc_dienGiai" aria-describedby="vc_dienGiaiHelp" value="{{ old('vc_dienGiai',  $danhsachvanchuyen->vc_dienGiai )}}">
    </div>
    <div class="form-group">
    <button class="btn btn-primary">Lưu</button>
    <a class="btn btn-danger" href="{{route('backend.vanchuyen.index')}}">Trở về</a>
    </div>
</form>
@endsection