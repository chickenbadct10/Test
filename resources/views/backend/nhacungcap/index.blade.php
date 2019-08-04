@extends('backend.layout.master')

@section('title')
Danh sách Nhà cung cấp
@endsection

@section('feature-title')
Danh sách Nhà cung cấp
@endsection

@section('feature-description')
Danh sách các Nhà cung cấp có trong Hệ thống!
@endsection

@section('content')
<a href="{{ route('backend.nhacungcap.create') }}" class="btn btn-primary">Thêm mới Nhà cung cấp</a>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên Nhà cung cấp</th>
            <th>Người đại diện</th>
            <th>Địa chỉ</th>
            <th>Điện thoại</th>
            <th>Email</th>
            <th>Xuất xứ</th>

            <th>Sửa</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stt = 1;
        ?>
        @foreach($danhsachnhacungcap as $ncc)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $ncc->ncc_ten }}</td>
            <td>{{ $ncc->ncc_daiDien }}</td>
            <td>{{ $ncc->ncc_diaChi }}</td>
            <td>{{ $ncc->ncc_dienThoai }}</td>
            <td>{{ $ncc->ncc_email }}</td>
            <td>{{ $ncc->xuatxusanpham->xx_ten }}</td>

            <td>
                <a href="{{ route('backend.nhacungcap.edit', ['id' => $ncc->ncc_ma]) }}" class="btn btn-success">Sửa</a>
                <form class="d-inline" method="post" action="{{ route('backend.nhacungcap.destroy', ['id' => $ncc->ncc_ma]) }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE" />
                    <button class="btn btn-danger">Xóa</button>
                </form>
            </td>
        </tr>
        <?php
        $stt++;
        ?>
        @endforeach
    </tbody>
</table>
{{ $danhsachnhacungcap->links() }}

@endsection
