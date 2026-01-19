<h1>Danh sách sản phẩm</h1>
<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Tên sản phẩm</th>
        <th>Giá</th>
    </tr>
    @foreach ($products as $product)
    <tr>
        <td>{{ $product['id'] }}</td>
        <td>{{ $product['name'] }}</td>
        <td>{{ $product['price'] }}</td>
    </tr>
    @endforeach

</table>
<button><a href="{{ route('welcome') }}">Trang Chủ</a></button>
<button><a href="{{ route('product.add') }}">Thêm sản phẩm</a></button>