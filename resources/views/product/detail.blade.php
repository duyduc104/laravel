@extends('app')

@section('content')
<h1>{{ $title }}</h1>
<div>
    <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" style="width: 100px;">
    <p><strong>ID:</strong> {{ $product['id'] }}</p>
    <p><strong>Tên sản phẩm:</strong> {{ $product['name'] }}</p>    
    <p><strong>Giá:</strong> {{ number_format($product['price'], 0, ',', '.') }} VNĐ</p>
    <p><strong>Mô tả:</strong> {{ $product['description'] }}</p>
</div>
<a href="{{ route('product.index') }}">Quay lại danh sách</a>
@endsection