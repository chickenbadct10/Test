@extends('backend.layout.master')

@section('title')
Danh sách Vận chuyển
@endsection

@section('feature-title')
Danh sách Vận chuyển   
@endsection

@section('feature-description')
Danh sách các Vận chuyển có trong Hệ thống!
@endsection

@section('content')
<a href="{{ route('backend.vanchuyen.create') }}" class="btn btn-primary">Thêm mới Vận chuyển</a>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên Vận chuyển</th>
            <th>Chi phí</th>
            <th>Diễn giải</th>
            <th>Sửa</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stt = 1;
        ?>
        @foreach($danhsachvanchuyen as $vc)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $vc->vc_ten }}</td>
            <td>{{ $vc->vc_chiPhi }}</td>
            <td>{{ $vc->vc_dienGiai }}</td>
            <td>
                <a href="{{ route('backend.vanchuyen.edit', ['id' => $vc->vc_ma]) }}" class="btn btn-success">Sửa</a>
                <form class="d-inline" method="post" action="{{ route('backend.vanchuyen.destroy', ['id' => $vc->vc_ma]) }}">
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
{{ $danhsachvanchuyen->links() }}

@endsection
