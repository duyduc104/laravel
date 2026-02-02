@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-lg" style="border-radius: 24px;">
                <div class="card-body p-5">
                    <h2 class="fw-bold text-navy mb-4 text-center">Thêm Sản Phẩm Mới</h2>
                    
                    <form action="{{ route('product.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <label class="form-label text-muted small fw-bold">TÊN SẢN PHẨM</label>
                            <input type="text" name="name" class="form-control shadow-none rounded-pill px-3 py-2 border-light bg-light" placeholder="Nhập tên sản phẩm..." required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label text-muted small fw-bold">GIÁ TIỀN ($)</label>
                                <input type="number" step="0.01" name="price" class="form-control shadow-none rounded-pill px-3 py-2 border-light bg-light" placeholder="0.00" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label text-muted small fw-bold">SỐ LƯỢNG KHO</label>
                                <input type="number" name="quatity" class="form-control shadow-none rounded-pill px-3 py-2 border-light bg-light" placeholder="0" required>
                            </div>
                        </div>

                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-primary-gradient py-3 shadow">Lưu Sản Phẩm</button>
                            <a href="{{ route('product.index') }}" class="btn btn-link text-decoration-none text-muted mt-2">Hủy bỏ và quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .text-navy { color: #1a237e; }
    .bg-light { background-color: #f8f9fa !important; }
    .btn-primary-gradient {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        border: none; color: white; font-weight: 600; border-radius: 15px;
        transition: 0.3s;
    }
    .btn-primary-gradient:hover { transform: translateY(-2px); box-shadow: 0 10px 20px rgba(79, 172, 254, 0.4); color: white; }
    .form-control:focus { border-color: #4facfe; background-color: #fff !important; }
</style>
@endsection