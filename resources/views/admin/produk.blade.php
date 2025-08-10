@extends ('admin.dashboard')

@section('style')
<style>
  .custom-table {
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 2px 6px rgba(150, 23, 101, 0.1);
  }
</style>
@section('content')


<table class="table">
  <thead class="table-dark">
    <tr >
      <th scope="col">No</th>
      <th scope="col">Nama Barang</th>
      <th scope="col">kategori</th>
      <th scope="col">Harga</th>
      <th scope="col">Stok</th>
      <th scope="col">Tanggal Dibuat</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>
    </tr>

  </tbody>
</table>


@endsection
