@extends('backend.layout.master')

@section('title')
Thêm mới Quyền
@endsection

@section('feature-title')
Thêm mới Quyền
@endsection

@section('feature-description')
Thêm mới Quyền. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form id="frmQuyen" name="frmQuyen" method="post" action="{{ route('backend.quyen.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="q_ten">Tên Quyền</label>
        <input type="text" class="form-control" id="q_ten" name="q_ten" aria-describedby="q_tenHelp" placeholder="Nhập tên Quyền" value="{{ old('q_ten') }}">
    </div>
    <div class="form-group">
        <label for="q_dienGiai">Diễn giải</label>
        <input type="text" class="form-control" id="q_dienGiai" name="q_dienGiai" aria-describedby="q_dienGiaiGiaiHelp" placeholder="Nhập diễn giải" value="{{ old('q_dienGiai') }}">
    </div>
    <div class="form-group">
    <button class="btn btn-primary">Lưu</button>
    <a class="btn btn-danger" href="{{route('backend.quyen.index')}}">Trở về</a>
    </div>
</form>
@endsection

@section('custom-scripts')
<script>
    $(document).ready(function () {
        $("#frmQuyen").validate({
            rules: {
                q_ten: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                }
                q_dienGiai: {
                    required: true,
                    minlength: 3,
                    maxlength: 191
                }
            },
            messages: {
                tt_ten: {
                    required: "Vui lòng nhập tên Quyền",
                    minlength: "Tên Quyền phải có ít nhất 3 ký tự",
                    maxlength: "Tên Quyền không được vượt quá 50 ký tự"
                },
                tt_dienGiai: {
                    required: "Vui lòng nhập diễn giải",
                    minlength: " Diễn giải phải có ít nhất 3 ký tự",
                    maxlength: " Diễn giải không được vượt quá 50 ký tự"
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