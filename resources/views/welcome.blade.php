@extends('app')

@section('content')
<h1>Trang Chủ</h1>
<button><a href="{{ route('product.index') }}">Danh sách sản phẩm</a></button>
@endsection