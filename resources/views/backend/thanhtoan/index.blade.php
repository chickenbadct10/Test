@extends('backend.layout.master')

@section('title')
Danh sách Thanh toán
@endsection

@section('feature-title')
Danh sách Thanh toán   
@endsection

@section('feature-description')
Danh sách các Thanh toán có trong Hệ thống!
@endsection

@section('content')
<a href="{{ route('backend.thanhtoan.create') }}" class="btn btn-primary">Thêm mới Thanh Toán</a>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên Thanh toán</th>
            <th>Diễn giải</th>
            <th>Sửa</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stt = 1;
        ?>
        @foreach($danhsachthanhtoan as $tt)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $tt->tt_ten }}</td>
            <td>{{ $tt->tt_dienGiai }}</td>
            <td>
                <a href="{{ route('backend.thanhtoan.edit', ['id' => $tt->tt_ma]) }}" class="btn btn-success">Sửa</a>
                <form class="d-inline" method="post" action="{{ route('backend.thanhtoan.destroy', ['id' => $tt->tt_ma]) }}">
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
{{ $danhsachthanhtoan->links() }}

@endsection
