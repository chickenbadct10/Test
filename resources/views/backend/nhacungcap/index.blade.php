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
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Tìm kiếm">
<div class="form-group">
<a href="{{ route('backend.nhacungcap.create') }}" class="btn btn-primary">Thêm mới Nhà cung cấp</a>
</div>
<table id="myTable" class="table table-striped table-bordered">
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
<script>
        function myFunction() {
          // Declare variables 
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("myInput");
          filter = input.value.toUpperCase();
          table = document.getElementById("myTable");
          tr = table.getElementsByTagName("tr");
        
          // Loop through all table rows, and hide those who don't match the search query
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
              txtValue = td.textContent || td.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            } 
          }
        }
        </script>
<style>
  #myInput {
  background-image: url('{{ asset('img/search.png') }}'); /* Add a search icon to input */
  background-position: 10px 12px; /* Position the search icon */
  background-repeat: no-repeat; /* Do not repeat the icon image */
  width: 100%; /* Full-width */
  font-size: 16px; /* Increase font-size */
  padding: 12px 20px 12px 40px; /* Add some padding */
  border: 1px solid #ddd; /* Add a grey border */
  margin-bottom: 12px; /* Add some space below the input */
}
</style>