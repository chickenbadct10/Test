@extends('backend.layout.master')

@section('title')
Sửa Sản phẩm máy bộ
@endsection

@section('feature-title')
Sửa Sản phẩm máy bộ    
@endsection

@section('feature-description')
Sửa Sản phẩm máy bộ. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form method="post" action="{{ route('backend.mayban.update', ['id' => $sp->mb_ma]) }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT" />
    <div class="form-group">
        <label for="l_ma">Loại sản phẩm</label>
        <select name="l_ma" class="form-control">
            @foreach($danhsachloai as $loai)
                @if(old('l_ma', $sp->l_ma) == $loai->l_ma)
                <option value="{{ $loai->l_ma }}" selected>{{ $loai->l_ten }}</option>
                @else
                <option value="{{ $loai->l_ma }}">{{ $loai->l_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="mb_ten">Tên sản phẩm</label>
        <input type="text" class="form-control" id="mb_ten" name="mb_ten" value="{{ old('mb_ten', $sp->mb_ten) }}">
    </div>
    <div class="form-group">
        <label for="mb_giaGoc">Giá gốc</label>
        <input type="number" class="form-control" id="mb_giaGoc" name="mb_giaGoc" value="{{ old('mb_giaGoc', $sp->mb_giaGoc) }}">
    </div>
    <div class="form-group">
        <label for="mb_giaBan">Giá bán</label>
        <input type="number" class="form-control" id="mb_giaBan" name="mb_giaBan" value="{{ old('mb_giaBan', $sp->mb_giaBan) }}">
    </div>
    <div class="form-group">
        <img src="{{ asset('storage/photos/' . $sp->mb_hinh) }}" class="sanpham-thumbnail" />
        <div class="file-loading">
            <label>Hình đại diện</label>
            <input id="mb_hinh" type="file" name="mb_hinh">
        </div>
    </div>
    <div class="form-group">
        <label for="mb_thongTin">Thông tin</label>
        <input type="text" class="form-control" id="mb_thongTin" name="mb_thongTin" value="{{ old('mb_thongTin', $sp->mb_thongTin) }}">
    </div>
    <div class="form-group">
        <label for="mb_danhGia">Đánh giá</label>
        <input type="text" class="form-control" id="mb_danhGia" name="mb_danhGia" value="{{ old('mb_danhGia', $sp->mb_danhGia) }}">
    </div>
    <div class="form-group">
    <select name="mb_trangThai" class="form-control">
        <option value="1" {{ old('mb_trangThai', $sp->mb_trangThai) == 1 ? "selected" : "" }}>Khóa</option>
        <option value="2" {{ old('mb_trangThai', $sp->mb_trangThai) == 2 ? "selected" : "" }}>Khả dụng</option>
    </select>
    </div>
    <div class="form-group">
    <button class="btn btn-primary">Lưu</button>
    <a type="button" href="{{route('backend.mayban.index')}}" class="btn btn-danger">Trở về</a>
    </div>
</form>
@endsection