@extends('backend.layout.master')

@section('title')
Thêm mới Sản phẩm máy bộ
@endsection

@section('feature-title')
Thêm mới Sản phẩm máy bộ
@endsection

@section('feature-description')
Thêm mới Sản phẩm. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('custom-css')
<style>
    .preview-upload {
        border: 1px dashed red;
        padding: 10px;
    }
    .preview-upload img {
        width: 100%;
    }
</style>
@endsection

@section('content')
<form method="post" action="{{ route('backend.sanpham.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="l_ma">Loại sản phẩm</label>
        <select name="l_ma" class="form-control">
            @foreach($danhsachloai as $loai)
                @if(old('l_ma') == $loai->l_ma)
                <option value="{{ $loai->l_ma }}" selected>{{ $loai->l_ten }}</option>
                @else
                <option value="{{ $loai->l_ma }}">{{ $loai->l_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="mb_ten">Tên sản phẩm</label>
        <input type="text" class="form-control" id="mb_ten" name="mb_ten" value="{{ old('mb_ten') }}">
    </div>
    <div class="form-group">
        <label for="mb_giaGoc">Giá gốc</label>
        <input type="number" class="form-control" id="mb_giaGoc" name="mb_giaGoc" value="{{ old('mb_giaGoc') }}">
    </div>
    <div class="form-group">
        <label for="mb_giaBan">Giá bán</label>
        <input type="number" class="form-control" id="mb_giaBan" name="mb_giaBan" value="{{ old('mb_giaBan') }}">
    </div>
    <div class="form-group">
        <div class="file-loading">
            <label>Hình đại diện</label>
            <input id="mb_hinh" type="file" name="mb_hinh">
            <div class="preview-upload">
                <img id='mb_hinh-upload'/>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="mb_thongTin">Thông tin</label>
        <input type="text" class="form-control" id="mb_thongTin" name="mb_thongTin" value="{{ old('mb_thongTin') }}">
    </div>
    <div class="form-group">
        <label for="mb_danhGia">Đánh giá</label>
        <input type="text" class="form-control" id="mb_danhGia" name="mb_danhGia" value="{{ old('mb_danhGia') }}">
    </div>
    <div class="form-group">
    <select name="mb_trangThai" class="form-control">
        <option value="1" {{ old('mb_trangThai') == 1 ? "selected" : "" }}>Khóa</option>
        <option value="2" {{ old('mb_trangThai') == 2 ? "selected" : "" }}>Khả dụng</option>
    </select>
    </div>
    <div class="form-group">
    <button class="btn btn-primary">Lưu</button>
    <a type="button" href="{{route('backend.mayban.index')}}" class="btn btn-danger">Trở về</a>
    </div>
</form>
@endsection

@section('custom-scripts')
<script>
    // Sử dụng FileReader để đọc dữ liệu tạm trước khi upload lên Server
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#mb_hinh-upload').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Bắt sự kiện, ngay khi thay đổi file thì đọc lại nội dung và hiển thị lại hình ảnh mới trên khung preview-upload
    $("#mb_hinh").change(function(){
        readURL(this);
    }); 
</script>
@endsection