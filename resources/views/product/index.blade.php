@extends('app')

@section('content')
<h1>{{ $title }}</h1>
<table border="1" cellpadding="10" class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Tên sản phẩm</th>
        <th>Giá</th>
        <th>Ảnh</th>
        <th>Mô tả</th>
        <th></th>
    </tr>
    @foreach ($products as $product)
    <tr>
        <td>{{ $product['id'] }}</td>
        <td><a href="{{ route('product.detail', ['id' => $product['id']]) }}">
            {{ $product['name'] }}
        </a></td>
        <td> {{ $product['price'] }}</td>
        <td><img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" width="100"></td>
        <td>{{ $product['description'] }}</td>
        <td>
            <button>Sửa</button>
            <button>Xoá</button>
        </td>
    </tr>
    @endforeach

</table>
<button><a href="{{ route('welcome') }}">Trang Chủ</a></button>
<button><a href="{{ route('product.add') }}">Thêm sản phẩm</a></button>
@endsection