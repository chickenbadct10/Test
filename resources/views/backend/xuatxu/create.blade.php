@extends('backend.layout.master')

@section('title')
Thêm mới Xuất xứ
@endsection

@section('feature-title')
Thêm mới Xuất xứ
@endsection

@section('feature-description')
Thêm mới Xuất xứ. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form id="frmXuatxu" name="frmXuatxu" method="post" action="{{ route('backend.xuatxu.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="xx_ten">Tên Xuất xứ</label>
        <input type="text" class="form-control" id="xx_ten" name="xx_ten" aria-describedby="xx_tenHelp" placeholder="Nhập tên xuất xứ" value="{{ old('xx_ten') }}">
    </div>
    <div class="form-group">
    <button class="btn btn-primary">Lưu</button>
    <a class="btn btn-danger" href="{{route('backend.xuatxu.index')}}">Trở về</a>
    </div>
</form>
@endsection

@section('custom-scripts')
<script>
    $(document).ready(function () {
        $("#frmXuatxu").validate({
            rules: {
                xx_ten: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
            },
            messages: {
                xx_ten: {
                    required: "Vui lòng nhập tên Xuất xứ",
                    minlength: "Tên Xuất xứ phải có ít nhất 3 ký tự",
                    maxlength: "Tên Xuất xứ không được vượt quá 50 ký tự"
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