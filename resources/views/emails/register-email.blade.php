<table style="width: 100%; border-spacing: 0px">
    <tr>
        <td style="border-top: 1px solid black;border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black; width: 153px; padding: 5px;"> <img src="{{ asset('img/icon.png') }}" style="width: 153px; height: 153px;" /> </td>
        <td style="border-top: 1px solid black;border-bottom: 1px solid black;border-right: 1px solid black; text-align: center; vertical-align: middle; padding: 5px;">
            <h1 style="color: red;">Phong Vũ - Computer</h1>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black; padding: 5px;"> Đây là email kích hoạt tài khoản của hệ thống website Phong Vũ - Computer: </td>
    </tr>
    <tr>
        <th style="border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black;text-align: right; padding: 5px;">Email thành viên:</th>
        <td style="border-bottom: 1px solid black;border-right: 1px solid black; padding: 5px;">{{ $data['nv_email'] }}</td>
    </tr>
    <tr>
        <th style="border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black;text-align: right; padding: 5px;">Họ tên thành viên:</th>
        <td style="border-bottom: 1px solid black;border-right: 1px solid black; padding: 5px;">{!! $data['nv_hoTen'] !!}</td>
    </tr>
    <tr>
        <th style="border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black;text-align: right; padding: 5px;">Link kích hoạt tài khoản:</th>
        <td style="border-bottom: 1px solid black;border-right: 1px solid black; padding: 5px;">
        <form class="d-inline" method="post" action="{{ route('activate', ['nv_ma' => $data['nv_ma']]) }}">
            {{ csrf_field() }}
            <button class="btn btn-danger">Click vào đây để kích hoạt tài khoản</button>
        </form>
    </tr>
</table>