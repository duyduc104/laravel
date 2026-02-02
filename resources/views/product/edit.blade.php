@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-lg" style="border-radius: 24px;">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <span class="badge bg-soft-primary text-primary mb-2">ID: #{{ $product->id }}</span>
                        <h2 class="fw-bold text-navy">Chỉnh Sửa Sản Phẩm</h2>
                    </div>
                    
                    <form action="{{ route('product.update', $product->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label class="form-label text-muted small fw-bold">TÊN SẢN PHẨM</label>
                            <input type="text" name="name" value="{{ $product->name }}" 
                                   class="form-control shadow-none rounded-pill px-3 py-2 border-light bg-light" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label text-muted small fw-bold">GIÁ TIỀN ($)</label>
                                <input type="number" step="0.01" name="price" value="{{ $product->price }}" 
                                       class="form-control shadow-none rounded-pill px-3 py-2 border-light bg-light" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label text-muted small fw-bold">SỐ LƯỢNG KHO</label>
                                <input type="number" name="quatity" value="{{ $product->quatity }}" 
                                       class="form-control shadow-none rounded-pill px-3 py-2 border-light bg-light" required>
                            </div>
                        </div>

                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-primary-gradient py-3 shadow">Cập Nhật Ngay</button>
                            <a href="{{ route('product.index') }}" class="btn btn-link text-decoration-none text-muted mt-2 small">Hủy và quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .text-navy { color: #1a237e; }
    .bg-soft-primary { background-color: #e3f2fd; }
    .btn-primary-gradient {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); /* Màu tím Navy sang trọng */
        border: none; color: white; font-weight: 600; border-radius: 15px;
        transition: 0.3s;
    }
    .btn-primary-gradient:hover { transform: translateY(-2px); box-shadow: 0 10px 20px rgba(118, 75, 162, 0.3); color: white; }
</style>
@endsection