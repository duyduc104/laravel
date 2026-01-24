@extends('app')

@section('content')
<div class="container mt-5">
    <h1 class="text-primary">Thêm sản phẩm mới</h1>

    <form method="POST" action="{{ route('product.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Tên sản phẩm</label>
            <input type="text" name="name" class="form-control" placeholder="Nhập tên máy...">
        </div>

        <div class="mb-3">
            <label class="form-label">Giá</label>
            <input type="number" name="price" class="form-control" placeholder="Nhập giá tiền...">
        </div>

        <button type="submit" class="btn btn-success">Lưu sản phẩm</button>
        <a href="{{ route('product.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection