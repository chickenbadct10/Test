@extends('backend.layout.master')

@section('title')
Thêm mới Nhà cung cấp
@endsection

@section('feature-title')
Thêm mới Nhà cung cấp
@endsection

@section('feature-description')
Thêm mới Nhà cung cấp. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form id="frmNhacungcap" name="frmNhacungcap" method="post" action="{{ route('backend.nhacungcap.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="ncc_ten">Tên Nhà cung cấp</label>
        <input type="text" class="form-control" id="ncc_ten" name="ncc_ten" aria-describedby="ncc_tenHelp" placeholder="Nhập tên Nhà cung cấp" value="{{ old('ncc_ten') }}">
    </div>
    <div class="form-group">
        <label for="ncc_daiDien">Người đại diện</label>
        <input type="text" class="form-control" id="ncc_daiDien" name="ncc_daiDien" aria-describedby="ncc_daiDienHelp" placeholder="Nhập Người đại diện" value="{{ old('ncc_daiDien') }}">
    </div>
    <div class="form-group">
        <label for="ncc_diaChi">Địa chỉ</label>
        <input type="text" class="form-control" id="ncc_diaChi" name="ncc_diaChi" aria-describedby="ncc_diaChiHelp" placeholder="Nhập Địa chỉ" value="{{ old('ncc_diaChi') }}">
    </div>
    <div class="form-group">
        <label for="ncc_dienThoai">Điện thoại</label>
        <input type="number" class="form-control" id="ncc_dienThoai" name="ncc_dienThoai" aria-describedby="ncc_dienThoaiHelp" placeholder="Nhập Điện thoại" value="{{ old('ncc_dienThoai') }}">
    </div>
    <div class="form-group">
        <label for="ncc_email">Email</label>
        <input type="text" class="form-control" id="ncc_email" name="ncc_email" aria-describedby="ncc_emailHelp" placeholder="Nhập email" value="{{ old('ncc_email') }}">
    </div>
    <div class="form-group">
        <label for="xx_ma">Xuất xứ sản phẩm</label>
        <select name="xx_ma" class="form-control">
            @foreach($danhsachxuatxu as $xx)
                @if(old('xx_ma') == $xx->xx_ma)
                <option value="{{ $xx->xx_ma }}" selected>{{ $xx_ma->xx_ten }}</option>
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

@section('custom-scripts')
<script>
    $(document).ready(function () {
        $("#frmNhacungcap").validate({
            rules: {
                ncc_ten: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                ncc_daiDien: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                xx_ma: {
                    required: true,
                },
            },
            messages: {
                ncc_ten: {
                    required: "Vui lòng nhập tên nhà cung cấp",
                    minlength: "Tên tên nhà cung cấp phải có ít nhất 3 ký tự",
                    maxlength: "Tên tên nhà cung cấp không được vượt quá 50 ký tự"
                },
                ncc_daiDien: {
                    required: "Vui lòng nhập tên Người đại diện",
                    minlength: "Tên Người đại diện phải có ít nhất 3 ký tự",
                    maxlength: "Tên Người đại diện không được vượt quá 50 ký tự"
                },
                xx_ma: {
                    required: "Vui lòng nhập chọn Xuất xứ",
                },
            },
            errorElement: "em",
            errorPlacement: function (error, element) {
                // Thêm class `invalid-feedback` vanchuyeno field đang có lỗi
                error.addClass("invalid-feedback");
                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.parent("label"));
                } else {
                    error.insertAfter(element);
                }
                // Thêm icon "Kiểm tra không Hợp lệ"
                if (!element.next("span")[0]) {
                    $("<span class='glyphicon glyphicon-remove form-control-feedback'></span>")
                        .insertAfter(element);
                }
            },
            success: function (label, element) {
                // Thêm icon "Kiểm tra Hợp lệ"
                if (!$(element).next("span")[0]) {
                    $("<span class='glyphicon glyphicon-ok form-control-feedback'></span>")
                        .insertAfter($(element));
                }
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).addClass("is-valid").removeClass("is-invalid");
            }
        });
    });
</script>
@endsection