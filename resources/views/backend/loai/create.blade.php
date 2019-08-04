@extends('backend.layout.master')

@section('title')
Thêm mới Chủ đề
@endsection

@section('feature-title')
Thêm mới chủ đề    
@endsection

@section('feature-description')
Thêm mới Chủ đề. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form id="frmLoai" name="frmLoai" method="post" action="{{ route('backend.loai.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="l_ten">Tên chủ đề</label>
        <input type="text" class="form-control" id="l_ten" name="l_ten" aria-describedby="l_tenHelp" placeholder="Nhập tên loại" value="{{ old('l_ten') }}">
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection

@section('custom-scripts')
<script>
    $(document).ready(function () {
        $("#frmLoai").validate({
            rules: {
                l_ten: {
                    required: true,
                    minlength: 3,
                    maxlength: 191
                }
            },
            messages: {
                l_ten: {
                    required: "Vui lòng nhập tên Loại",
                    minlength: "Tên Loại phải có ít nhất 3 ký tự",
                    maxlength: "Tên Loại không được vượt quá 191 ký tự"
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