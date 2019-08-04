@extends('backend.layout.master')

@section('title')
Thêm mới Vận chuyển
@endsection

@section('feature-title')
Thêm mới Vận chuyển 
@endsection

@section('feature-description')
Thêm mới Vận chuyển. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form id="frmVanchuyen" name="frmVanchuyen" method="post" action="{{ route('backend.vanchuyen.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="vc_ten">Tên Vận chuyển</label>
        <input type="text" class="form-control" id="vc_ten" name="vc_ten" aria-describedby="vc_tenHelp" placeholder="Nhập tên Vận chuyển" value="{{ old('vc_ten') }}">
    </div>
    <div class="form-group">
        <label for="vc_chiPhi">Chi phí</label>
        <input type="number" class="form-control" id="vc_chiPhi" name="vc_chiPhi" aria-describedby="vc_chiPhiHelp" placeholder="Nhập chi phí" value="{{ old('vc_chiPhi') }}">
    </div>
    <div class="form-group">
        <label for="vc_dienGiai">Diễn giải</label>
        <input type="text" class="form-control" id="vc_dienGiai" name="vc_dienGiai" aria-describedby="vc_dienGiaiHelp" placeholder="Nhập diễn giải" value="{{ old('vc_dienGiai') }}">
    </div>
    <div class="form-group">
    <button class="btn btn-primary">Lưu</button>
    <a class="btn btn-danger" href="{{route('backend.vanchuyen.index')}}">Trở về</a>
    </div>
</form>
@endsection

@section('custom-scripts')
<script>
    $(document).ready(function () {
        $("#frmVanchuyen").validate({
            rules: {
                vc_ten: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                vc_chiPhi: {
                    required: true,
                    minlength: 3,
                    maxlength: 191
                },
                vc_dienGiai: {
                    required: true,
                    minlength: 3,
                    maxlength: 191
                }
            },
            messages: {
                vc_ten: {
                    required: "Vui lòng nhập tên Vận chuyển",
                    minlength: "Tên Vận chuyển phải có ít nhất 3 ký tự",
                    maxlength: "Tên Vận chuyển không được vượt quá 50 ký tự"
                },
                vc_chiPhi: {
                    required: "Vui lòng nhập chi phí",
                    minlength: "Tên chi phí phải có ít nhất 3 ký tự",
                    maxlength: "Tên chi phí không được vượt quá 50 ký tự"
                },
                vc_dienGiai: {
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