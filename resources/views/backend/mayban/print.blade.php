@extends('print.layout.paper')

@section('title')
Biểu mẫu Phiếu in danh sách sản phẩm máy bộ
@endsection

@section('paper-size') A4 @endsection
@section('paper-class') A4 @endsection

@section('custom-css')
<style>
.sanpham-thumbnail {
    width: 100px;
    height: 100px;
}
.logo {
    width: 200px;
    height: 200px;
}
</style>
@endsection

@section('content')
<section class="sheet padding-10mm">
    <article>
        <table border="0" align="center" cellspacing="0">
            <tr>
                <td class="companyInfo" align="center">
                    Công ty TNHH Phong Vũ - Computer<br />
                    http://cusc.cb/<br />
                    070-657-8886<br />
                    <img src="{{ asset('img/icon.png') }}" class="logo" />
                </td>
            </tr>
        </table>
        <br />
        <br />
        <?php 
        $tongSoTrang = ceil(count($danhsachsanpham)/5);
            ?>
        <table border="1" align="center" cellpadding="5">
            <caption>Danh sách sản phẩm</caption>
            <tr>
                <th colspan="6" align="center">Trang 1 / {{ $tongSoTrang }}</th>
            </tr>
            <tr>
                <th>STT</th>
                <th>Hình sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Giá gốc</th>
                <th>Giá bán</th>
                <th>Loại sản phẩm</th>
            </tr>
            @foreach ($danhsachsanpham as $sp)
            <tr>
                <td align="center">{{ $loop->index + 1 }}</td>
                <td align="center">
                    <img class="sanpham-thumbnail" src="{{ asset('storage/photos/' . $sp->mb_hinh) }}" />
                </td>
                <td align="left">{{ $sp->mb_ten }}</td>
                <td align="right">{{ $sp->mb_giaGoc }}</td>
                <td align="right">{{ $sp->mb_giaBan }}</td>
                @foreach ($danhsachloai as $l)
                @if ($sp->l_ma == $l->l_ma)
                <td align="left">{{ $l->l_ten }}</td>
                @endif
                @endforeach
            </tr>
            @if (($loop->index + 1) % 5 == 0)
        </table>
        <div class="page-break"></div>
        <table border="1" align="center" cellpadding="5">
            <tr>
                <th colspan="6" align="center">Trang {{ 1 + floor(($loop->index + 1) / 5) }} / {{ $tongSoTrang }}</th>
            </tr>
            <tr>
                <th>STT</th>
                <th>Hình sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Giá gốc</th>
                <th>Giá bán</th>
                <th>Loại sản phẩm</th>
            </tr>
            @endif
            @endforeach
        </table>
    </article>
</section>
@endsection
   