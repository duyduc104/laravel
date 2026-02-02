@extends('layouts.app')

@section('content')
<h1>CHi tiết sản phẩm</h1>
<div>
    {{-- <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" style="width: 100px;"> --}}
    <p><strong>ID:</strong> {{ $product['id'] }}</p>
    <p><strong>Tên sản phẩm:</strong> {{ $product['name'] }}</p>    
    <p><strong>Giá:</strong> {{ $product['price'] }} VNĐ</p>
    <p><strong>Số lượng</strong> {{ $product['quatity'] }}</p>
</div>
<a href="{{ route('product.index') }}">Quay lại danh sách</a>
@endsection