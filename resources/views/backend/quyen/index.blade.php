@extends('backend.layout.master')

@section('title')
Danh sách Quyền
@endsection

@section('feature-title')
Danh sách Quyền
@endsection

@section('feature-description')
Danh sách các Quyền có trong Hệ thống!
@endsection

@section('content')
<a href="{{ route('backend.quyen.create') }}" class="btn btn-primary">Thêm mới Quyền</a>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên Quyền</th>
            <th>Diễn giải</th>
            <th>Sửa</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stt = 1;
        ?>
        @foreach($danhsachquyen as $q)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $q->q_ten }}</td>
            <td>{{ $q->q_dienGiai }}</td>
            <td>
                <a href="{{ route('backend.quyen.edit', ['id' => $q->q_ma]) }}" class="btn btn-success">Sửa</a>
                <form class="d-inline" method="post" action="{{ route('backend.quyen.destroy', ['id' => $q->q_ma]) }}">
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
{{ $danhsachquyen->links() }}

@endsection
