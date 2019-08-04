@extends('backend.layout.master')

@section('title')
Cập nhật Nhà cung cấp
@endsection

@section('feature-title')
Cập nhật Nhà cung cấp
@endsection

@section('feature-description')
Cập nhật Nhà cung cấp. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form method="post" action="{{ route('backend.nhacungcap.update', ['id' => $danhsachnhacungcap->ncc_ma]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT" />
    <div class="form-group">
        <label for="ncc_ten">Tên Xuất xứ</label>
        <input type="text" class="form-control" id="ncc_ten" name="ncc_ten" aria-describedby="ncc_tenHelp" value="{{  old('ncc_ten', $danhsachnhacungcap->ncc_ten) }}">
    </div>
    <div class="form-group">
        <label for="ncc_daiDien">Người đại diện</label>
        <input type="text" class="form-control" id="ncc_daiDien" name="ncc_daiDien" aria-describedby="ncc_daiDienHelp" value="{{  old('ncc_daiDien', $danhsachnhacungcap->ncc_daiDien )}}">
    </div>
    <div class="form-group">
        <label for="ncc_diaChi">Địa chỉ</label>
        <input type="text" class="form-control" id="ncc_diaChi" name="ncc_diaChi" aria-describedby="ncc_diaChiHelp" value="{{ old('ncc_diaChi',  $danhsachnhacungcap->ncc_diaChi )}}">
    </div>
    <div class="form-group">
        <label for="ncc_dienThoai">Điện thoại</label>
        <input type="text" class="form-control" id="ncc_dienThoai" name="ncc_dienThoai" aria-describedby="ncc_dienThoaiHelp" value="{{  old('sp_ncc_dienThoaigiaGoc', $danhsachnhacungcap->ncc_dienThoai )}}">
    </div>
    <div class="form-group">
        <label for="ncc_email">Email</label>
        <input type="text" class="form-control" id="ncc_email" name="ncc_email" aria-describedby="ncc_emailHelp" value="{{ old('ncc_email', $danhsachnhacungcap->ncc_email) }}">
    </div>    
    <div class="form-group">
        <label for="xx_ma">Xuất xứ sản phẩm</label>
        <select name="xx_ma" class="form-control">
            @foreach($danhsachxuatxu as $xx)
                @if(old('xx_ma', $xx->xx_ma) == $xx->xx_ma)
                <option value="{{ $xx->xx_ma }}" selected>{{ $xx->xx_ten }}</option>
                @else
                <option value="{{ $xx->xx_ma }}">{{ $xx->xx_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
    <button class="btn btn-primary">Lưu</button>
    <a class="btn btn-danger" href="{{route('backend.nhacungcap.index')}}">Trở về</a>
    </div>
</form>
@endsection