@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-lg" style="border-radius: 20px;">
                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        <span class="badge badge-pill badge-soft-primary px-3 py-2 text-primary">Sản phẩm ID: #{{ $product->id }}</span>
                        <h3 class="fw-bold text-dark mt-2">Cập Nhật Thông Tin</h3>
                    </div>
                    
                    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-7 mb-3">
                                <label class="form-label text-muted small fw-bold uppercase">Tên sản phẩm</label>
                                <input type="text" name="name" value="{{ $product->name }}" class="form-control custom-input" required>
                            </div>
                            <div class="col-md-5 mb-3">
                                <label class="form-label text-muted small fw-bold uppercase">Danh mục</label>
                                <select name="category_id" class="form-control custom-input" required>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                                            {{ $cat->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label text-muted small fw-bold uppercase">Giá gốc (₫)</label>
                                <input type="number" name="price" value="{{ $product->price }}" class="form-control custom-input" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label text-muted small fw-bold uppercase">Giá giảm (₫)</label>
                                <input type="number" name="sale_price" value="{{ $product->sale_price }}" class="form-control custom-input">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label text-muted small fw-bold uppercase">Số lượng kho</label>
                                <input type="number" name="quatity" value="{{ $product->quatity }}" class="form-control custom-input" required>
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <div class="col-md-2 mb-3 text-center">
                                <img src="{{ $product->image ? asset('uploads/products/' . $product->image) : asset('adminLTE/dist/img/default-150x150.png') }}" 
                                     class="rounded border shadow-sm w-100" style="object-fit: cover;">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted small fw-bold uppercase">Thay đổi hình ảnh</label>
                                <div class="custom-file small">
                                    <input type="file" name="image" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Chọn ảnh mới...</label>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3 text-right">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" name="is_active" class="custom-control-input" id="activeSwitch" {{ $product->is_active ? 'checked' : '' }}>
                                    <label class="custom-control-label font-weight-bold" for="activeSwitch">Đang bán</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label text-muted small fw-bold uppercase">Mô tả sản phẩm</label>
                            <textarea name="description" class="form-control custom-input" rows="3">{{ $product->description }}</textarea>
                        </div>

                        <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                            <a href="{{ route('product.index') }}" class="text-muted small"><i class="fas fa-arrow-left mr-1"></i> Hủy và quay lại</a>
                            <button type="submit" class="btn btn-dark-gradient px-5 py-2 shadow font-weight-bold rounded-pill">LƯU THAY ĐỔI</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .custom-input { border-radius: 12px; border: 1px solid #e9ecef; padding: 10px 15px; background-color: #fcfcfc; transition: 0.3s; }
    .custom-input:focus { border-color: #764ba2; background-color: #fff !important; }
    .uppercase { text-transform: uppercase; letter-spacing: 0.5px; }
    .badge-soft-primary { background-color: #e3f2fd; }
    .btn-dark-gradient {
        background: linear-gradient(135deg, #232526 0%, #414345 100%);
        border: none; color: white; transition: 0.3s;
    }
    .btn-dark-gradient:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(0,0,0,0.3); color: white; }
</style>

<script>
    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
        var fileName = document.getElementById("customFile").files[0].name;
        var nextSibling = e.target.nextElementSibling;
        nextSibling.innerText = fileName;
    });
</script>
@endsection