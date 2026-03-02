@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-lg" style="border-radius: 20px;">
                <div class="card-body p-4">
                    <h3 class="fw-bold mb-4 text-center text-dark">Tạo Sản Phẩm</h3>
                    
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-7 mb-3">
                                <label class="form-label text-muted small fw-bold uppercase">Tên sản phẩm</label>
                                <input type="text" name="name" class="form-control custom-input" placeholder="Ví dụ: Áo khoác da lộn..." required>
                            </div>
                            <div class="col-md-5 mb-3">
                                <label class="form-label text-muted small fw-bold uppercase">Danh mục</label>
                                <select name="category_id" class="form-control custom-input" required>
                                    <option value="">chọn</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label text-muted small fw-bold uppercase">Giá gốc (₫)</label>
                                <input type="number" name="price" class="form-control custom-input" placeholder="0" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label text-muted small fw-bold uppercase">Giá giảm (₫)</label>
                                <input type="number" name="sale_price" class="form-control custom-input" placeholder="0">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label text-muted small fw-bold uppercase">Số lượng kho</label>
                                <input type="number" name="quatity" class="form-control custom-input" placeholder="0" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8 mb-3">
                                <label class="form-label text-muted small fw-bold uppercase">Hình ảnh sản phẩm</label>
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Chọn file...</label>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3 d-flex align-items-end">
                                <div class="custom-control custom-switch mb-2">
                                    <input type="checkbox" name="is_active" class="custom-control-input" id="activeSwitch" checked>
                                    <label class="custom-control-label font-weight-bold" for="activeSwitch">Kích hoạt bán</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label text-muted small fw-bold uppercase">Mô tả ngắn</label>
                            <textarea name="description" class="form-control custom-input" rows="3" placeholder="Nhập mô tả sản phẩm..."></textarea>
                        </div>

                        <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                            <a href="{{ route('product.index') }}" class="text-muted"><i class="fas fa-chevron-left mr-1"></i> Quay lại</a>
                            <button type="submit" class="btn btn-dark px-5 py-2 shadow-sm font-weight-bold rounded-pill">LƯU SẢN PHẨM</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .custom-input {
        border-radius: 12px;
        border: 1px solid #e9ecef;
        padding: 10px 15px;
        background-color: #fcfcfc;
        transition: 0.3s;
    }
    .custom-input:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(0,123,255,.05);
        background-color: #fff;
    }
    .uppercase { text-transform: uppercase; letter-spacing: 0.5px; }
    .btn-dark { background-color: #1a1a1a; border: none; }
    .btn-dark:hover { background-color: #333; transform: translateY(-1px); }
</style>

<script>
    // Hiển thị tên file khi chọn ảnh
    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
        var fileName = document.getElementById("customFile").files[0].name;
        var nextSibling = e.target.nextElementSibling;
        nextSibling.innerText = fileName;
    });
</script>
@endsection